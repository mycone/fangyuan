<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\system\models\Menu;
use yii\helpers\Json;
use app\modules\system\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model common\modules\menu\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menus' => Menu::getMenuSource(),
        'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <!-- <div class="box-header with-border">
                <?=$this->title?>
            </div> -->
            <div class="box-body pad">
                <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>
                
                <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
                
                <?= $form->field($model, 'name', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'maxlength' => 128,
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'parent_name', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'id' => 'parent_name',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'route', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'id' => 'route',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'order', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textInput([
                    'type' => 'number',
                    'id' => 'rule-name',
                    'class' => 'form-control',
                ]) ?>

                <?= $form->field($model, 'data', [
                    'labelOptions' => ['class'=>'col-lg-2 control-label'],
                    'template' => '
                                {label}
                                <div class="col-lg-10">
                                {input}
                                {error}
                                </div>
                                ',
                ])->textarea([
                    'rows' => 6,
                    'class' => 'form-control',
                ]) ?>


                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php
                        echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
                            'class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger'])
                        ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>