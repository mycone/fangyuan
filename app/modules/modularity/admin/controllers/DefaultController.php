<?php
/**
 * 模块管理
 * @author chenhao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\modules\modularity\admin\controllers;

use app\core\BackendController;
use app\modules\modularity\models\Modularity;

class DefaultController extends BackendController
{
    /**
     * 模块列表
     */
    public function actionIndex() 
    {
        $modules = $this->modularityService->getAllModules();
        return $this->render('index',[
            'modules' => $modules,
        ]);
    }
    
    /**
     * 安装模块
     * @return \yii\web\Response
     */
    public function actionInstall($id)
    {
        $model = new Modularity();
        $model->id = $id;
        $model->enable_admin = 0;
        $model->enable_home = 0;
        $model->save();
    
        $modules = $this->modularityService->getAllModules();
        if (isset($modules[$id]) && $modules[$id]['instance'] !== null)
        {
            $modules[$id]['instance']->install();
        }
        return $this->redirect([
            'index'
        ]);
    }
    
    /**
     * 卸载模块
     * @return \yii\web\Response
     */
    public function actionUninstall($id)
    {
        Modularity::deleteAll(['id' => $id ]);
    
        $modules = $this->modularityService->getAllModules();
        if (isset($modules[$id]) && $modules[$id]['instance'] !== null)
        {
            $modules[$id]['instance']->uninstall();
        }
    
        return $this->redirect([
            'index'
        ]);
    }
    
    /**
     * 启用模块
     * @param string $id
     * @param string $is_admin
     * @return \yii\web\Response
     */
    public function actionActive($id, $is_admin = null)
    {
        $field = $is_admin === null ? 'enable_home' : 'enable_admin';
        Modularity::updateAll([$field => 1], ['id' => $id ]);
    
        $modules = $this->modularityService->getAllModules();
        if (isset($modules[$id]) && $modules[$id]['instance'] !== null)
        {
            if ($is_admin === null)
            {
                $modules[$id]['instance']->activeHome();
            }
            else
            {
                $modules[$id]['instance']->activeAdmin();
            }
        }
        return $this->redirect([
            'index'
        ]);
    }
    
    /**
     * 禁用模块
     * @param string $id
     * @param string $is_admin
     * @return \yii\web\Response
     */
    public function actionDeactive($id, $is_admin = null)
    {
        $field = $is_admin === null ? 'enable_home' : 'enable_admin';
        Modularity::updateAll([$field => 0], ['id' => $id ]);
    
        $modules = $this->modularityService->getAllModules();
        if (isset($modules[$id]) && $modules[$id]['instance'] !== null)
        {
            if ($is_admin === null)
            {
                $modules[$id]['instance']->deactiveHome();
            }
            else
            {
                $modules[$id]['instance']->deactiveAdmin();
            }
        }
        return $this->redirect([
            'index'
        ]);
    }
    
}