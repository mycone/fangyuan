<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\modules\system\models\config\DatetimeConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '时间设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">时区与时间</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10">
                        <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                            <?= $form->field($model, 'sys_datetime_timezone')->dropDownList(DatetimeConfig::getTimezoneItems()); ?>
                    	    <?= $form->field($model, 'sys_datetime_date_format')?>
                    	    <?= $form->field($model, 'sys_datetime_time_format')->radioList(['24'=>'24 小时制','12'=>'12 小时制','0'=>'不显示时间'])?>
                    	    <?= $form->field($model, 'sys_datetime_pretty_format')->radioList(['1'=>'是','0'=>'否'])?>
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
           
