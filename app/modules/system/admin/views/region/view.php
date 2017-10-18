<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '地区管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => '您确认要删除本条记录吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
            </div>
            <div class="box-body">
                <div class="region-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'class',
            'parent_code',
            'initial',
            'pinying',
            'is_open',
        ],
    ]) ?>

</div>
            </div>
        </div>
    </div>
</div>
