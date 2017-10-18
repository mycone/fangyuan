<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput() ?>

    <?= $form->field($model, 'parent_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'initial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pinying')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_open')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '请选择']) ?>
    
    <div class="form-group">
       <label class="control-label col-sm-3"> </label>
       <div class="col-sm-6"><?= Html::submitButton($model->isNewRecord ? '创 建' : '更 新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
