<?php
/**
 * 站点信息设置
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\helpers\ArrayHelper;

$this->title = '注册与访问控制';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">注册与权限</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10">
                        <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                            <?= $form->field($model, 'sys_allow_register')->checkbox([],false)?>
                            <?php //echo $form->field($model, 'sys_default_role')->dropDownList(ArrayHelper::map(Role::buildOptions(), 'id', 'name','category')) ?>
                            <?= $form->field($model, 'project_allow_talk_num')?>
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
