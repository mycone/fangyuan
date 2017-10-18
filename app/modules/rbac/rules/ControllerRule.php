<?php
namespace app\modules\rbac\rules;

use app\core\CH;

class ControllerRule extends Rule
{

    public function execute($permission, $params = [], $role = null)
    {
        $actionId = isset($params['actionId']) ? $params['actionId'] : CH::getApp()->requestedAction->id;
        
        $actions = $permission['value'];
        if (in_array($actionId, $actions))
        {
            return true;
        }
        
        $method = CH::getApp()->getRequest()->method;
        $method = strtolower($method);
        if (in_array($actionId . ':' . $method, $actions))
        {
            return true;
        }
        
        return false;
    }
}