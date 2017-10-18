<?php
namespace app\modules\fangyuan\admin;

use Yii;
use app\core\BaseModule;

class AdminModule extends BaseModule 
{
    public $controllerNamespace = 'app\modules\fangyuan\admin\controllers';
    public $defaultRoute = 'work';
    
    public function init() {
        parent::init();
        //other code
    }
}