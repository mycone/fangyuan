<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = '更新地区: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '地区管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新地区';
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">更新地区</h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>

