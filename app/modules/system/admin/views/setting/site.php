<?php
/**
 * 站点信息设置
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '站点信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10">
                        <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                            <?= $form->field($model, 'sys_site_name')?>
                            <?= $form->field($model, 'sys_site_description')?>
                            <?= $form->field($model, 'sys_site_email')?>
                            <?= $form->field($model, 'sys_lang')->dropDownList(['zh-CN'=>'中文','en-US'=>'英文'])?>
                            <?= $form->field($model, 'sys_icp')?>
                            <?= $form->field($model, 'sys_stat')->textarea()?>
                            <?php //echo $form->field($model, 'sys_site_about',['size'=>'default'])->textarea()?>
                            <?= $form->field($model, 'sys_status')->radioList(['1'=>'正常','0'=>'关闭'])?>
                            <?php //echo KindEditor::widget(['inputId'=>'#basicconfig-sys_site_about','width'=>'70%'])?>
                            <?php //echo $form->defaultButtons() ?>
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
