<?php
/**
 * 更新用户
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */
$this->title = "更新用户(".$model->username.")";
$this->params['breadcrumbs'][] = ['label'=>'用户管理','url'=>['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
            </div>
        </div>
    </div>
</div>