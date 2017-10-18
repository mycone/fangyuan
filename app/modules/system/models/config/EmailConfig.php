<?php

namespace app\modules\system\models\config;

use Yii;
use app\models\ConfigForm;

class EmailConfig extends ConfigForm
{
	public $sys_email_from;
	public $sys_email_name;
	public $sys_email_smtp_host;
	public $sys_email_smtp_port;
	public $sys_email_smtp_user;
	public $sys_email_smtp_password;
	public $sys_email_smtp_encrypt;
	
    public function rules()
    {
        return [
            [['sys_email_from','sys_email_name','sys_email_smtp_host','sys_email_smtp_user','sys_email_smtp_password','sys_email_smtp_encrypt'], 'string'],
            [['sys_email_smtp_port'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_email_from' => '发信邮箱',
            'sys_email_name'=>'发信人',
            'sys_email_smtp_host'=>'SMTP服务器',
            'sys_email_smtp_port'=>'SMTP端口号',
            'sys_email_smtp_user'=>'SMTP帐号',
            'sys_email_smtp_password'=>'SMTP密码',
            'sys_email_smtp_encrypt' => '是否加密',
        ];
    }
    
    public static function encryptLabel() {
        return [
            '不加密码',
            'ssl' => 'ssl',
            'tls' => 'tls',
        ];
    }
}
