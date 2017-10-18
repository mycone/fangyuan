<?php

namespace app\modules\fangyuan\models;

use Yii;

/**
 * This is the model class for table "{{%orders_info}}".
 *
 * @property string $orders_id
 */
class OrdersInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders_id'], 'required'],
            [['orders_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orders_id' => 'Orders ID',
        ];
    }
}
