<?php
/**
 * 系统配置模型
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\models;

use Yii;
use app\core\CH;
use app\helpers\ArrayHelper;
use app\core\BaseActiveRecord;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $id
 * @property string $value
 */
class Config extends BaseActiveRecord
{
    const CachePrefix='config_';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['value'], 'string'],
            [['id'], 'string', 'max' => 64]
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => '名称', 
            'value' => '值'
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
    public static function getModel($id,$fromCache=true)
    {
        $cacheKey = self::CachePrefix.$id;
        
        $value = $fromCache ? CH::getCache($cacheKey) : false;
        
        if($value===false)
        {
            $value = Config::findOne(['id'=>$id]);
            if($value !== null)
            {
                CH::setCache($cacheKey, $value);
            }
        }
        return $value;
    }
    
    public static function getValue($id,$fromCache=true)
    {
        $value = self::getModel($id, $fromCache);
        if($value===null)
        {
            return '不存在配置项：'.$id;
        }
        return $value->value;
    }
    
    public static function clearCachedConfig($id)
    {
        $cacheKey = self::CachePrefix.$id;
        CH::deleteCache($cacheKey);
    }
    
    public function clearCache()
    {
        self::clearCachedConfig($this->id);
    }
}
