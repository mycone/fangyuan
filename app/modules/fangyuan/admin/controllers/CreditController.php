<?php
/**
 * 贷款审批
 * @author chenhao
 */
namespace app\modules\fangyuan\admin\controllers;

use Yii;
use app\core\BackendController;

class CreditController extends BackendController
{
    
    /**
     * 客户审批
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * 审批统计
     */
    public function actionReport()
    {
        return $this->render('report');
    }
    
}