<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\core\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '地区管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-sm btn-primary" href="<?php echo Url::to(['create'])?>"><i class="fa fa-sitemap"></i> 添加</a>
                </div>
                <div class="col-sm-offset-6 col-sm-3">
                    <?php $form = ActiveForm::begin([
                        'id' => 'RegionSearch-form',
                        'method' => 'get',
                        'action' => ['index'],
                        'options' => ['class' => 'form-horizontal'],
                    ]); ?>
                    <div class="input-group input-group-sm">
                        <?php echo Html::activeTextInput($searchModel, 'keywords',['class'=>'form-control','placeholder'=>'请输入地区名或地区编码']);?>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">搜索</button>
                        </span>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                </div>
            </div>
            <div class="box-body">
                        <div class="region-index">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                    
                                //'id',
                                'name',
                                'code',
                                'class',
                                //'parent_code',
                                // 'initial',
                                // 'pinying',
                                'is_open',
                    
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

