<?php

namespace app\modules\fangyuan\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property string $id
 * @property string $name
 * @property string $idcard
 * @property string $mobile
 * @property string $updated_at
 * @property string $created_at
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'idcard', 'mobile'], 'required'],
            [['id', 'updated_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['idcard'], 'string', 'max' => 18],
            [['mobile'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'idcard' => '身份证号码',
            'mobile' => '手机',
            'updated_at' => '更新时间',
            'created_at' => '创建时间',
        ];
    }
}
