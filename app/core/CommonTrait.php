<?php
namespace app\core;
use app\models\Config;

/**
 * 本Trait应用于 控制器及视图基类，主要用于获取各模块的service
 * 及系统配置
 * @author ChenHao <dzswchenhao@126.com>
 * @since 1.0
 */
trait CommonTrait
{
    /**
     * 魔术方法，用于获取模块中的  service
     * @param string $name
     */
    public function __get($name)
    {
        $dot = strpos($name,'Service');
        if($dot>0)
        {
            $serviceName = substr($name,0,$dot);
            return CH::getService($serviceName);
        }
        return parent::__get($name);
    }
    
    /**
     * 获取配置
     * @param string $id
     * @param boolean $fromCache
     */
    public function getConfig($id, $fromCache=true)
    {
        return Config::getModel($id, $fromCache);
    }
    
    /**
     * 获取配置值
     * @param string $id
     * @param string $fromCache
     * @return string
     */
    public function getConfigValue($id, $fromCache = true)
    {
        return Config::getValue($id, $fromCache);
    }
    
    /**
     * 输出配置项值
     * @param string $id
     */
    public function showConfigValue($id)
    {
        $value = self::getConfigValue($id);
        if(!empty($value))
        {
            echo $value;
        }
    }
    
}
