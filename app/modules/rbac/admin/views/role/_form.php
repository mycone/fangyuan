<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\rbac\models\Role;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Role */
/* @var $form yii\widgets\ActiveForm */

?>

    <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'category')->dropDownList(Role::getCategoryItems()) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <div class="form-group">
       <label class="control-label col-sm-3"> </label>
       <div class="col-sm-6"><?= Html::submitButton($model->isNewRecord ? '创 建' : '更 新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>