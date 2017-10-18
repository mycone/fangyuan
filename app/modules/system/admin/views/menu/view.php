<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <p>
                        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?php
                        echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
                            'data-method' => 'post',
                        ]);
                        ?>
                    </p>
                </div>
                <div class="box-body pad">
                    
                    <div class="row">
                        <div class="col-lg-11">
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'menuParent.name:text:Parent',
                                    'name',
                                    'route',
                                    'order',
                                    'data',
                                ],
                            ])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>