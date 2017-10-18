<?php
/**
 * 业务管理
 * @author chenhao
 */
namespace app\modules\fangyuan\admin\controllers;

use Yii;
use app\core\BackendController;
use app\modules\fangyuan\models\Customer;

class WorkController extends BackendController
{
    /**
     * 进件
     */
    public function actionCreate()
    {
        $model = new Customer();
        return $this->render('create',[
            'model' => $model,
        ]);
    }
    
    /**
     * 客户管理
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * 业务统计
     */
    public function actionReport()
    {
        return $this->render('report');
    }
    
}