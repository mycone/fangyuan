<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div class="row">
<div class="col-sm-10">
<?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($this->rbacService->getAllRoles(), 'id', 'name','category'),['prompt'=>'请选择']) ?>
<?= $form->field($model, 'status')->dropDownList($model::getStatusLabel(),['prompt'=>'请选择']) ?>

<div class="form-group">
   <label class="control-label col-sm-3"> </label>
   <div class="col-sm-6"><?= Html::submitButton($model->isNewRecord ? '创 建' : '更 新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
</div>

<?php ActiveForm::end(); ?>

</div>
</div>