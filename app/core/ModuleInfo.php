<?php
/**
 * 模块信息基类
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\core;

use yii\base\Object;

class ModuleInfo extends Object
{
    /*模块ID*/
    public $id;
    /*模块名*/
    public $name;
    /*模块版本*/
    public $version;
    /*模块说明*/
    public $description;
    /*URL*/
    public $url;
    /*作者*/
    public $author;
    /*作者网址*/
    public $author_url;
    /*是否为系统模块*/
    public $is_system = false;

    public $is_content;

    public function install()
    {
    }

    public function uninstall()
    {
    }

    public function upgrader()
    {
    }

    public function activeAdmin()
    {
    }

    public function deactiveAdmin()
    {
    }

    public function activeHome()
    {
    }

    public function deactiveHome()
    {
    }
}
