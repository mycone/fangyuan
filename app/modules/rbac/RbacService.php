<?php
namespace app\modules\rbac;

use Yii;
use app\modules\rbac\models\Role;
use app\modules\rbac\models\Permission;
use app\modules\rbac\models\Relation;
use yii\db\Query;
use app\core\CH;
use app\models\Admin;

class RbacService extends \app\core\ModuleService
{

    const CachePrefix = 'rbac_';

    private $roleTable;

    private $permissionTable;

    private $relationTable;

    private $ruleNamespace = '\app\modules\rbac\rules\\';

    public function init()
    {
        parent::init();
        
        $this->roleTable = Role::tableName();
        $this->permissionTable = Permission::tableName();
        $this->relationTable = Relation::tableName();
    }

    public function getServiceId()
    {
        return 'rbacService';
    }

    public function getRolesByUser($username) {
        $username === null && $username = CH::getIdentity()->username;
        
        if($username===CH::getIdentity()->username) {
            $role = CH::getIdentity()->role;
        }
        else {
            if (is_int($username)) {
                $user = Admin::findOne($username);
            }
            else {
                $user = Admin::findOne(['username'=>$username]);
            }
            $role = $user ? $user->role : NULL;
        }
        return $role;
    }

    public function getPermissionsByUser($username = null) {
        $role = $this->getRolesByUser($username);
       
        return $this->getPermissionsByRole($role);
    }

    public function getPermissionsByRole($role, $fromCache = true)
    {
        $cacheKey = self::CachePrefix . $role;
        
        $value = $fromCache ? CH::getCache($cacheKey) : false;
        if ($value === false)
        {
            $query = new Query();
            $query->select([
                'p.id', 
                'p.category', 
                'p.name', 
                'p.description', 
                'p.form', 
                'p.default_value', 
                'p.rule', 
                'p.sort_num', 
                'r.role', 
                'r.value'
            ]);
            $query->from([
                'p' => $this->permissionTable, 
                'r' => $this->relationTable
            ]);
            $query->where('r.permission=p.id');
            $query->andWhere([
                'r.role' => $role
            ]);
            $rows = $query->all();
            $value = $this->convertPermissionValue($rows);
            
            CH::setCache($cacheKey, $value);
        }
        return $value;
    }
    
    public function getPermissionsRoutesByUser($username=null)
    {
        $permissions = $this->getPermissionsByUser($username);
        $ret = [];
        foreach ($permissions as $perm => $row)
        {
            if(is_array($row)) {
                foreach ($row as $p) {
                    if($p['category'] == Permission::Category_Controller && is_array($p['value'])) {
                        foreach ($p['value'] as $action) {
                            $action = explode(':', $action);
                            array_push($ret, '/'.$p['id'].'/'.$action[0]);
                        }
                    }
                }
            }
        }
        $ret = array_unique($ret);
        sort($ret);
        return $ret;
    }

    private function convertPermissionValue($rows)
    {
        $ret = [];
        if ($rows === null)
        {
            return $ret;
        }
        foreach ($rows as $row)
        {
            $form = intval($row['form']);
            if ($form === Permission::Form_Boolean)
            {
                $v = self::isTrue($row['value']);
            }
            else if ($form === Permission::Form_CheckboxList)
            {
                $v = explode(',', $row['value']);
            }
            else
            {
                $v = $row['value'];
            }
            $row['value'] = $v;
            $ret[$row['id']][] = $row;
        }
        return $ret;
    }

    public function checkPermission($permission = null, $params = [], $username = null)
    {
        if (empty($permission))
        {
            $permission = Yii::$app->controller->uniqueId;
        }
        if (empty($username))
        {
            $username = CH::getIdentity()->username;
        }
        $rows = $this->getPermissionsByUser($username);
        
        if (! isset($rows[$permission]))
        {
            return false;
        }
        
        return $this->executeRule($rows[$permission], $params,$username);
    }

    public function checkHomePermission($permission = null, $params = [], $user = null)
    {
        if ($user === null)
        {
            $user = CH::getIdentity()->username;
        }
        if ($permission === null)
        {
            $permission = Yii::$app->controller->uniqueId;
        }
        $permission = 'home_' . $permission;
        
        $rows = $this->getPermissionsByUser($user);
        
        if (! isset($rows[$permission]))
        {
            return false;
        }
        
        return $this->executeRule($rows[$permission], $params, $user);
    }

    private function executeRule($permission, $params = [], $user)
    {
        if (is_array($permission))
        {
            foreach ($permission as $p)
            {
                if (empty($p['rule']))
                {
                    return true;
                }
                $ruleClass = $this->ruleNamespace . $p['rule'];
                
                $ruleInstance = new $ruleClass();
                $ret = $ruleInstance->execute($p, $params, $user);
                if ($ret === true)
                {
                    return true;
                }
            }
            return false;
        }
        else
        {
            if (empty($permission['rule']))
            {
                return true;
            }
            
            $ruleClass = $this->ruleNamespace . $permission['rule'];
            
            $ruleInstance = new $ruleClass();
            return $ruleInstance->execute($permission, $params, $user);
        }
    }

    public function getAllRoles()
    {
        return Role::buildOptions();
    }
    
    private static function isTrue($obj,$compareTo=null)
    {
        if($obj===null)
        {
            return false;
        }
        if($obj===true || is_string($obj) && strtolower($obj)==='true'||$obj===1||$obj==='1'||$obj===$compareTo)
        {
            return true;
        }
        return false;
    }
}
