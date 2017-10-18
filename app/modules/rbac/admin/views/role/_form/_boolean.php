<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */

$value=intval($value);
?>

<div class="da-form-list inline">
    <div class="radio-inline"><label style="font-weight:normal;"><input type="radio" name="Permission[<?php echo $permission['id']?>]" value="1" <?php if($value===1){echo 'checked';}?>> 是</label></div>
    <div class="radio-inline"><label style="font-weight:normal;"><input type="radio" name="Permission[<?php echo $permission['id']?>]" value="0" <?php if($value!==1){echo 'checked';}?>> 否</label></div>
</div>
                                                    