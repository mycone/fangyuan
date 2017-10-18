<?php

namespace app\core;

use Yii;
use app\core\CH;
use app\models\ConfigForm;
use yii\base\InvalidParamException;

class BackendController extends BaseController
{
    /**
     * Action前置事件
     * @see \yii\web\Controller::beforeAction()
     */
    public function beforeAction($action) {
        if(parent::beforeAction($action)) {
            //不需要登录的action
            if(in_array($action->uniqueID, $this->ignoreLogin())) 
            {
                return true;
            }
            //来宾用户先登录
            if(Yii::$app->user->isGuest) 
            {
                $this->redirect(['/site/login']);
                Yii::$app->end();
            }
            //允许访问的action，不需要验证权限
            if(in_array($action->uniqueID, $this->ingorePermission()))
            {
                return true;
            }
            //权限验证
            if (!$this->rbacService->checkPermission('manager_admin') || !$this->rbacService->checkPermission())
            {
                throw new \yii\web\ForbiddenHttpException('权限不足，无法进行此项操作，请与管理员联系！');
                return false;
            }
            return true;
        }
        return false;
    }
    
    /**
     * 保存配置
     * @param ConfigForm $model
     * @param string $view
     * @throws InvalidParamException
     */
    public function doConfig(ConfigForm $model, $view = null)
    {
        if (! ($model instanceof ConfigForm))
        {
            throw new InvalidParamException('model must be instance of ConfigForm');
        }
    
        if (Yii::$app->getRequest()->isPost && $model->load(Yii::$app->getRequest()->post()) && $model->saveAll())
        {
            CH::setSuccessMessage('保存成功');
            return $this->refresh();
        }
        else
        {
            if ($view === null)
            {
                $view = $this->action->id;
            }
            $model->initAll();
            return $this->render($view, [
                'model' => $model
            ]);
        }
    }
    
    /**
     * 不需要登录的action
     * @return multitype:string
     */
    public function ignoreLogin()
    {
        return [
            'site/login',
            'site/captcha',
        ];
    }
    
    /**
     * 不需要验证权限的action
     * @return multitype:string
     */
    public function ingorePermission()
    {
        return [
            'site/logout',
            'site/error',
            'site/welcome',
            'site/index',
            'site/reset-password',
        ];
    }
    
    
}