<?php
/**
 * 角色管理
 * @author chenhao
 * @since 1.0
 */
use yii\helpers\Url;
use yii\helpers\Html;
use app\core\grid\GridView;
use app\modules\rbac\models\Role;

$this->title = "角色管理";
$this->params['breadcrumbs'][] = $this->title;

//数据列
$columns =  [
    [
        'attribute'=>'id',
        //'width'=>'120px;'
    ],
    [
        'attribute'=>'name',
        //'width'=>'250px;'
    ],
     
    [
        'attribute'=>'description',
        //'width'=>'auto'
    ],

    [
        'class' => 'yii\grid\ActionColumn',
        'template'=>'{permission} {update} {delete}',
        //'width'=>'60px',
        'buttons' =>['permission'=>function ($url,$model) {
            return Html::a('<span class="fa fa-key"></span>', Url::to(['relation','role'=>$model['id']]), [
                'title' => '设置权限',
            ]);
        },'delete'=>function($url,$model){
            if($model->is_system)
            {
                return '';
            }
            return Html::a('<span class="fa fa-trash"></span>', $url, [
                'title' => Yii::t('yii', 'Delete'),
                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'data-method' => 'post',
                'data-pjax' => '0'
            ]);
        }],
    ],
];
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a class="btn btn-sm btn-primary" href="<?php echo Url::to(['role/create'])?>"><i class="fa fa-info-circle"></i> 创 建</a>
            </div>
            <div class="box-body pad">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_<?php echo Role::Category_Admin?>" data-toggle="tab" aria-expanded="false">管理员角色</a></li>
                                    <li class=""><a href="#tab_<?php echo Role::Category_System?>" data-toggle="tab" aria-expanded="false">系统角色</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_<?php echo Role::Category_Admin?>">
                                        <?= GridView::widget([
                                            'dataProvider' => $adminsDataProvider,
                                            'columns' => $columns,
                                        ]); ?>
                                    </div>
                                    <div class="tab-pane" id="tab_<?php echo Role::Category_System?>">
                                        <?= GridView::widget([
                                            'dataProvider' => $systemsDataProvider,
                                            'columns' => $columns,
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>