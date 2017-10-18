<?php
namespace app\core;

use Yii;
use app\core\CommonTrait;

/**
 * @property \app\modules\modularity\ModularityService $modularityService
 * @property \app\modules\rbac\RbacService $rbacService
 * @author chenhao
 * @since 1.0
 */
class BaseController extends \yii\web\Controller
{
    use CommonTrait;
    
    public function init() {
        parent::init();
        //other code
        
    }
}