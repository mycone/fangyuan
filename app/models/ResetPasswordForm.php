<?php
/**
 * 重置密码
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\models;

use Yii;
use yii\base\Model;

class ResetPasswordForm extends Model
{
    public $oldpassword;
    public $password;
    public $repassword;
    private $_user;
    
    public function init() {
        parent::init();
        $this->_user = Yii::$app->getUser()->identity;
    }
    
    public function rules()
    {
        return [
            ['oldpassword','trim'],
            ['oldpassword','required'],
            ['oldpassword','validatePassword'],
            
            ['password','trim'],
            ['password','required'],
            ['password','string','min'=>6],
            
            ['repassword','trim'],
            ['repassword','required'],
            ['repassword','string','min'=>6],
            ['repassword','compare','compareAttribute'=>'password']
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $admin = $this->_user;
            if (!$admin || !$admin->validatePassword($this->oldpassword)) {
                $this->addError($attribute, "原密码不正确.");
            }
        }
    }
    
    public function attributeLabels()
    {
        return [
            'password' => '新密码',
            'oldpassword' => '原密码',
            'repassword' => '确认密码',
        ];
    }
    
    public function resetPassword() {
        if($this->validate()) {
            $user = $this->_user;
            $user->password = $this->password;
            //$user->setPassword($this->password);
            return $user->save(false);
        }
        return false;
    }
}