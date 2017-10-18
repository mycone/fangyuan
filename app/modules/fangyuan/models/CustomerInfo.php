<?php

namespace app\modules\fangyuan\models;

use Yii;

/**
 * This is the model class for table "{{%customer_info}}".
 *
 * @property string $customer_id
 */
class CustomerInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
        ];
    }
}
