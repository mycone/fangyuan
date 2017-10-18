<?php
/**
 * 系统配置项表单模型
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\models;

use yii\base\Model;
use app\models\Config;

class ConfigForm extends Model
{
    public function initAll()
    {
        $this->initAllInternal();
    }
    
    public function saveAll()
    {
        $this->saveAllInternal();
    }
    
    protected function getAllIds()
    {
        return array_keys($this->attributeLabels());
    }
    
    protected function initAllInternal()
    {
        $ids = $this->getAllIds();
        foreach($ids as $id)
        {
            $this->initOneInternal($id);
        }
    }
    
    protected function initOneInternal($id, $defaultValue = '')
    {
        $model = Config::findOne(['id' => $id]);
        if($model != null)
        {
            $this->$id = $model->value;
        }
        else
        {
            if(empty($defaultValue) && $this->$id!==null)
            {
                $defaultValue = $this->$id;
            }
            $model = new Config();
            $model->id = $id;
            $model->value = $defaultValue;
            $model->save();
            	
            $this->$id = $defaultValue;
        }
    }
    
    protected function saveAllInternal()
    {
        $ids = $this->getAllIds();
        foreach($ids as $id)
        {
            $this->saveOneInternal($id, $this->$id);
        }
    }
    
    protected function saveOneInternal($id, $value)
    {
        Config::updateAll(['value' => $value], ['id' => $id]);
        Config::clearCachedConfig($id);
    }
}