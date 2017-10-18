<?php
namespace app\core;

use yii\web\View as BaseView;
use app\core\CommonTrait;
use app\widgets\LoopData;

/**
 * 视图组件
 * @author chenhao <dzswchenhao@126.com>
 * @property \app\modules\rbac\RbacService $rbacService
 * @property \app\modules\post\PostService $postService
 * @property \app\modules\modularity\ModularityService $modularityService
 * 
 */
class View extends BaseView
{
    //引入各模块服务
    use CommonTrait;
    
    /**
     * 循环输出列表数据
     * @param static $dataSource 源数据
     * @param string $item 列表项模板
     * @param array $appendOptions
     */
    public function loopData($dataSource, $item, $appendOptions = [])
    {
        $options = [];
        $options['dataSource'] = $dataSource;
        $options['item'] = $item;
    
        echo LoopData::widget($options);
    }
    
    /**
     * 开始循环输出数据
     * @param static $dataSource 源数据
     * @param string $item 列表项模板
     * @param array $appendOptions
     * @return \yii\base\static
     */
    public function beginLoopData($dataSource, $item, $appendOptions = [])
    {
        $options = [];
        $options['dataSource'] = $dataSource;
        $options['item'] = $item;
    
        return LoopData::begin($options);
    }
    
    /**
     * 结束循环输出数据
     */
    public function endLoopData()
    {
        LoopData::end();
    }
}

