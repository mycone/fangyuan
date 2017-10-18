<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '修改密码';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body pad">
                <div class="row">
                    <div class="col-sm-10">
                    <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                    <?= $form->field($model, 'oldpassword')->passwordInput() ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'repassword')->passwordInput() ?>
                    <div class="form-group">
                       <label class="control-label col-sm-3"> </label>
                       <div class="col-sm-6"><?= Html::submitButton('确认', ['class'=>'btn btn-primary']) ?></div>
                    </div>
                    
                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>