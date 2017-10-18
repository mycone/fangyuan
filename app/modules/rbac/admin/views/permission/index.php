<?php

use yii\helpers\Url;
use app\core\grid\GridView;
use app\modules\rbac\models\Permission;

$this->title = "权限管理";
$this->params['breadcrumbs'][] = $this->title;

$columns =  [

    [
        'attribute'=>'id',
        //'width'=>'150px',
    ],
    [
        'attribute'=>'name',
        //'width'=>'250px',
    ],
    [
        'attribute'=>'description',
        //'width'=>'auto'
    ],
    [
        'attribute' => 'form',
        'value' => function($model){
            return Permission::getFormItems($model->form);
        }
    ],

    ['attribute' => 'sort_num'],
    ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
    ];
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
               <a class="btn btn-sm btn-primary" href="<?php echo Url::to(['permission/create'])?>"><i class="fa fa-key"></i> 创 建</a>
            </div>
            <div class="box-body pad">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="nav-tabs-custom">
                                
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_<?php echo Permission::Category_Controller?>" data-toggle="tab" aria-expanded="true">控制器权限</a></li>
                                    <li class=""><a href="#tab_<?php echo Permission::Category_System?>" data-toggle="tab" aria-expanded="false">系统权限</a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_<?php echo Permission::Category_Controller?>">
                                        <?= GridView::widget([
                                            'dataProvider' => $controllersDataProvider,
                                            'columns' => $columns,
                                        ]); ?>
                                    </div>
                                    <div class="tab-pane" id="tab_<?php echo Permission::Category_System?>">
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