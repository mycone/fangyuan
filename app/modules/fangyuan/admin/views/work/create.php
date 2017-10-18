<?php
/**
 * 客户进件视图
 * @author chenhao
 * @since 1.0
 */
$this->title = "客户进件";
$this->params['breadcrumbs'][] = '业务管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body">
        <?= $this->render('_form', [
             'model' => $model,
        ])?>
    </div>
</div>
