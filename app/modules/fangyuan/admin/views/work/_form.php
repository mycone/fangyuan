<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 20,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'idcard')->textInput(['maxlength' => 18]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>


    <div class="form-group">
       <label class="control-label col-sm-3"> </label>
       <div class="col-sm-6"><?= Html::submitButton($model->isNewRecord ? '创 建' : '更 新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>