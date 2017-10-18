<?php

namespace app\models;

use Yii;
use app\core\BaseActiveRecord;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $class
 * @property string $parent_code
 * @property string $initial
 * @property string $pinying
 * @property string $is_open
 */
class Region extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'class'], 'required'],
            [['class'], 'integer'],
            [['is_open'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['code', 'parent_code', 'pinying'], 'string', 'max' => 30],
            [['initial'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '地区名',
            'code' => '地区编码',
            'class' => '类别',//1级省直辖市；2级市；3级区县
            'parent_code' => '父编码',//(用于递归查询)
            'initial' => '首字母',
            'pinying' => '地区拼音',
            'is_open' => '是否开通', //本城市是否开通，Y开通，N未开通，默认N
        ];
    }
}
