<?php
/**
 * 后端应用
* @author chenhao
* @since 1.0
*/

namespace app\core;

class WebApplication extends  BaseApplication
{
    /**
     * 应用初始化
     * @see \yii\base\Application::init()
     */
    public function init() {
        parent::init();
        $this->loadActiveModules(TRUE);
    }
}