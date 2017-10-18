<?php

namespace app\modules\fangyuan\models;

use Yii;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property string $id
 * @property string $code
 * @property string $admin_id
 * @property string $customer_id
 * @property string $guaranty_id
 * @property string $apply_money
 * @property integer $apply_month
 * @property string $real_money
 * @property integer $real_month
 * @property string $real_rates
 * @property integer $status
 * @property string $created_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'customer_id', 'apply_money', 'apply_month'], 'required'],
            [['admin_id', 'customer_id', 'guaranty_id', 'apply_month', 'real_month', 'status', 'created_at'], 'integer'],
            [['apply_money', 'real_money', 'real_rates'], 'number'],
            [['code'], 'string', 'max' => 18],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键ID',
            'code' => '编号',
            'admin_id' => '录入用户ID，与admin表关联',
            'customer_id' => '客户ID，与customer表关联',
            'guaranty_id' => '担保物ID，与guaranty表关联',
            'apply_money' => '申请金额',
            'apply_month' => '申请期限',
            'real_money' => '批贷金额',
            'real_month' => '批贷期限',
            'real_rates' => '批贷利率',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }
}
