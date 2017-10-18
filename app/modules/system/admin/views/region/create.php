<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = '添加地区';
$this->params['breadcrumbs'][] = ['label' => '地区管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo Html::encode($this->title)?></h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
