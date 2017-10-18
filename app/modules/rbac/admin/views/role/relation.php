<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = '设定权限:'.$role['name'].'('.$role['id'].')' ;
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['role/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
    <?php $form=ActiveForm::begin();?>
        <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php $i=0;foreach($categories as $cateId=>$cateName):?>
                            <li <?php if($i==0):?>class="active"<?php endif;?>><a href="#tabs-<?php echo $cateId?>" data-toggle="tab" <?php if($i==0):?>aria-expanded="true"<?php else:?> aria-expanded="false" <?php endif;?>><?php echo $cateName?></a></li>
                        <?php $i++;endforeach;?>
                    </ul>
                    <div class="tab-content">
                        <?php $i=0;foreach($categories as $cateId=>$cateName):?>
                        <div class="tab-pane<?php if($i==0):?> active<?php endif;?>" id="tabs-<?php echo $cateId?>">
                        
                            <?php foreach ($allPermissions[$cateId] as $permission):?>
                            <?php $v = isset($rolePermissions[$permission['id']]) ? $rolePermissions[$permission['id']]['value'] : $permission->getDefaultValue();?>
                                <div class="row"><div style="padding:15px;">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="permission-<?php echo $permission['id']?>"><?php echo $permission['name']?></label>
                                    <div class="col-sm-10">
                                        <?php echo $this->render('_form/'. $permission['formView'], ['permission'=>$permission,'value'=>$v]);?>
                                    </div>
                                </div></div>
                                </div>
                            <?php endforeach;?>
                            <div class="row"><div style="padding:15px;">
                            <div class="form-group">
                               <label class="control-label col-sm-2"> </label>
                               <div class="col-sm-10"><?= Html::submitButton('保 存', ['class' => 'btn btn-primary']) ?></div>
                            </div></div>
                            </div>
                        </div>
                        <?php $i++;endforeach;?>
                    </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>


    