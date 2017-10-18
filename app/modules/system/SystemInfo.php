<?php
namespace app\modules\system;

use app\core\ModuleInfo;

class SystemInfo extends ModuleInfo
{
    /**
     * 初始化模块信息
     * @see \yii\base\Object::init()
     */
    public function init()
    {
        parent::init();
        
        $this->id='system';
        $this->name = '系统模块';
        $this->version = '1.0';
        $this->description = '系统设置，如站点信息、邮箱信息、时间等';
        
        $this->is_system = true;
    }
}
