<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\modules\system\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
               <?= Html::a(Yii::t('rbac-admin', 'Create Menu'), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
            <div class="box-body pad">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
                        
                            <?php Pjax::begin(); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'attribute' => 'menuParent.name',
                    'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                        'class' => 'form-control', 'id' => null
                    ]),
                    'label' => Yii::t('rbac-admin', 'Parent'),
                ],
                'route',
                'order',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


