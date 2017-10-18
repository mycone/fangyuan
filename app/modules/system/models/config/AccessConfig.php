<?php

namespace app\modules\system\models\config;

use Yii;
use app\models\ConfigForm;

class AccessConfig extends ConfigForm
{

	
	public $sys_allow_register;
	//public $sys_default_role;
	public $project_allow_talk_num;
	
	
    public function rules()
    {
        return [
            //[['sys_default_role'], 'string'],
			[['sys_allow_register'],'boolean'],
            [['project_allow_talk_num'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          
            'sys_allow_register' => '允许注册',
            //'sys_default_role' => '用户默认角色',
            'project_allow_talk_num' => '项目最多洽谈次数',
        ];
    }
}
