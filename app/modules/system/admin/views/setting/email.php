<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '邮件设置';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">邮件设置</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10">
                        <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                            <?= $form->field($model, 'sys_email_from')?>
                            <?= $form->field($model, 'sys_email_name')?>
                            <?= $form->field($model, 'sys_email_smtp_host')?>
                            <?= $form->field($model, 'sys_email_smtp_port')?>
                            <?= $form->field($model, 'sys_email_smtp_user')?>
                            <?= $form->field($model, 'sys_email_smtp_password')->passwordInput()?>
                            <?= $form->field($model, 'sys_email_smtp_encrypt')->radioList($model::encryptLabel())?>
                            <div class="form-group">
                               <label class="control-label col-sm-3"> </label>
                               <div class="col-sm-6"><?= Html::submitButton('保 存', ['class' => 'btn btn-primary']) ?></div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    