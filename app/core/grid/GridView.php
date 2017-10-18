<?php
namespace app\core\grid;

use yii\grid\GridView as BaseGridView;

/**
 *
 * @author 归海一刀
 *        
 */
class GridView extends BaseGridView
{
    /*布局*/
    public $layout = "{items}\n{pager}";
    /*分页*/
    public $pager = [
        'firstPageLabel'=>"首页",
        'prevPageLabel'=>'上一页',
        'nextPageLabel'=>'下一页',
        'lastPageLabel'=>'尾页',
    ];
    /*列表Table样式*/
    public $tableOptions = ['class' => 'table table-striped table-bordered table-advance table-hover dataTable'];
}

?>