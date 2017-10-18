<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\rbac\models\Category;
use app\modules\rbac\models\Permission;
use app\core\CH;
use app\modules\rbac\rules\Rule;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Permission */
/* @var $form yii\widgets\ActiveForm */

?>

<?php /*$this->toolbars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);*/?>

    <?php $form = ActiveForm::begin(['layout'=>'horizontal']); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'category')->dropDownList(Permission::getCategoryItems()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'form')->radioList(Permission::getFormItems()) ?>

    <?= $form->field($model, 'default_value')->textarea(['rows'=>8]) ?>
    
    <?= $form->field($model, 'description')->textarea(['rows'=>5]) ?>

    <?= $form->field($model, 'rule')->dropDownList(Rule::getRules()) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    
    <div class="form-group">
       <label class="control-label col-sm-3"> </label>
       <div class="col-sm-6"><?= Html::submitButton($model->isNewRecord ? '创 建' : '更 新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>