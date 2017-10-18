<?php
namespace app\modules\fangyuan;

use Yii;
use app\core\ModuleInfo;

class FangyuanInfo extends ModuleInfo
{

    public function init()
    {
        parent::init();

        $this->id = 'fangyuan';
        $this->name = '方圆贷款管理';
        $this->version = '1.0';
        $this->description = '方圆贷款管理核心模块，包含：业务管理、贷款审批、权证办理、放款记账、还款管理几个子模块';

        $this->is_system = true;
    }
}