<?php
namespace app\core;

use app\core\BaseComponent;

abstract class ModuleService extends BaseComponent implements IModuleService
{

    public abstract function getServiceId();
    
    public function getModel($name)
    {
        
    }
}
