<?php
/**
 * 查看用户
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "查看用户(".$model->username.")";
$this->params['breadcrumbs'][] = ['label'=>'用户管理','url'=>['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <p>
                <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('删除', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-danger',
                    'data' => [
                        'confirm' => '您确认删除本用户信息吗?',
                        'method' => 'post',
                    ],
                ]) ?>
                </p>
            </div>
            <div class="box-body pad">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <?= DetailView::widget([
                        'model' => $model,
                         'attributes' => [
                                'id',
                                'username',
                                'email:email',
                                ['label'=>'角色','attribute'=>'roles.name'],
                                'status',
                                'created_at:datetime',
                                'updated_at:datetime',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
