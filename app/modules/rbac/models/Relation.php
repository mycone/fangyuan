<?php

namespace app\modules\rbac\models;

use Yii;
use app\core\CH;
use app\modules\rbac\RbacService;

/**
 * This is the model class for table "lulu_auth_relation".
 *
 * @property string $role
 * @property string $permission
 * @property string $value
 */
class Relation extends BaseRbacActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_relation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'permission'], 'required'],
            [['value'], 'string','max'=>128],
            [['role', 'permission'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role' => '角色',
            'permission' => '权限',
            'value' => '值',
        ];
    }

    public static function AddBatchItems($role, $permissions)
    {
        try {
            $transaction = Yii::$app->db->beginTransaction();
            self::deleteAll(['role' => $role]);
            CH::deleteCache(RbacService::CachePrefix.$role);
            
            foreach ($permissions as $key => $value)
            {
                $newRelation = new Relation();
                $newRelation->role = $role;
                $newRelation->permission = $key;
                $newRelation->value = is_string($value) ? $value : implode(',', $value);
                if(!$newRelation->save()) throw new \yii\base\ErrorException('Save permissions to DB unsuccessfully');
            }
            
            $transaction->commit();
        }
        catch (\yii\base\ErrorException $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
