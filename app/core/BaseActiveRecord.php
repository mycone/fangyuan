<?php
namespace app\core;

class BaseActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * 删除后置方法
     * @see \yii\db\BaseActiveRecord::afterDelete()
     */
    public function afterDelete()
    {
        parent::afterDelete();
        $this->clearCache();
    }
    
    /**
     * 保存后置方法
     * @see \yii\db\BaseActiveRecord::afterSave($insert, $changedAttributes)
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->clearCache();
    }
    
    /**
     * 清除缓存（用于重写）
     */
    public function clearCache()
    {
    
    }
    
}
