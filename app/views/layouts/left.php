<?php
use app\core\Menu;
use app\modules\system\helpers\MenuHelper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo !\Yii::$app->getUser()->isGuest ? \Yii::$app->getUser()->getIdentity()->username : ''?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <?php
        $menu = MenuHelper::getAssignedMenu(\Yii::$app->getUser()->id,null,null,true);
        array_unshift($menu, ['label' => '首页', 'icon' => 'dashboard', 'url' => ['/site']]);
        array_unshift($menu,['label' => '管理菜单', 'options' => ['class' => 'header']]);
        echo Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items'=> $menu,
        ]);
        ?>

    </section>

</aside>
