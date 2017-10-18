<?php
/**
 * 用户管理
 */

use yii\helpers\Url;
use app\core\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "用户管理";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-3">
                        <a class="btn btn-sm btn-primary" href="<?php echo Url::to(['default/create'])?>"><i class="fa fa-user-plus"></i> 创 建</a>
                    </div>
                    <div class="col-sm-offset-6 col-sm-3">
                        <?php $form = ActiveForm::begin([
                            'id' => 'UserSearch-form',
                            'method' => 'get',
                            'action' => ['index'],
                            'options' => ['class' => 'form-horizontal'],
                        ]); ?>
                        <div class="input-group input-group-sm">
                            <?php echo Html::activeTextInput($model, 'keywords',['class'=>'form-control','placeholder'=>'请输入用户名或邮箱']);?>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">搜索</button>
                            </span>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div class="box-body pad">
                 <div class="dataTables_wrapper form-inline dt-bootstrap">
                     <div class="row">
                         <div class="col-sm-12">
                             
                             <!-- Grid Table Start -->
                             <?php echo GridView::widget([
                                 'dataProvider' => $dataProvider,
                                 'columns' => [
                                     ['class' => SerialColumn::className()],
                                     'username','email',
                                     ['label'=>'角色','attribute'=>'roles.name'],
                                     ['attribute'=>'created_at','format' => ['date', 'php:Y-m-d H:i']],
                                     'status',
                                     ['class' => ActionColumn::className()],
                                 ],
                             ])?>
                             <!-- Grid Table End -->
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>