<?php
namespace app\core;

use Yii;
use app\helpers\FileHelper;

/**
 *
 * @author ChenHao
 * @property \app\modules\modularity\ModularityService $modularityService
 */
class BaseApplication extends \yii\web\Application
{
    /**
     * 活动模块
     * @var array
     */
    public $activeModules = [];
    
    /**
     * 加载活动模块
     * @param bool $isAdmin
     */
    public function loadActiveModules($isAdmin=FALSE)
    {
        $moduleManager = $this->modularityService;
    
        $this->activeModules = $moduleManager->getActiveModules($isAdmin);
        
        $module = $isAdmin ? 'admin\AdminModule' : 'home\HomeModule';
        foreach ($this->activeModules as $m)
        {
            $moduleId = $m['id'];
            $moduleDir = $m['dir'];
            $ModuleClassName = $m['dir_class'];
            
            $this->setModule($moduleId, [
                'class' => 'app\modules\\' . $moduleDir . '\\' . $module
            ]);
    
            $serviceFile = Yii::getAlias('@app') . '\modules\\' . $moduleDir . '\\' . $ModuleClassName . 'Service.php';
            
            if (FileHelper::exist($serviceFile))
            {
                $serviceClass = 'app\modules\\' . $moduleDir . '\\' . $ModuleClassName . 'Service';
                $serviceInstance = new $serviceClass();
                $this->set($serviceInstance->getServiceId(), $serviceInstance);
            }
        }
    }
}
