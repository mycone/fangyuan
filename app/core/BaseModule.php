<?php
namespace app\core;


class BaseModule extends \yii\base\Module
{

    const Status_Installed = 'Installed';

    const Status_Uninstalled = 'Uninstalled';

    const Status_Activity = 'Activity';

    const Status_Inactivity = 'Inactivity';

    public $status;

    public $modularityService;
    
    public $moduleInfo;
    
    public function init()
    {
        parent::init();
        
        $this->modularityService = CH::getService('modularity');
    }
	
	public function getMenus()
	{
	    return [];
	    /*$menus = [
	        ['title'=>'新建','url'=>'www.qianbutou.com'],
	        ['url'=>'www.qianbutou.com','title'=>'新建'],
	        ['title','url'],
	    ];
	    return $menus;*/
	}
	
	public function getRoutings()
	{
	    
	}
	
	public function getPermissions()
	{
	    $permissions = [
	        ['key'=>'create','title'=>'create post','description'=>'create a new post'],
	    ];
	}
	
}
