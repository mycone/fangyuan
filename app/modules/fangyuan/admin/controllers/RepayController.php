<?php
/**
 * 还款管理
 * @author chenhao
 */
namespace app\modules\fangyuan\admin\controllers;

use Yii;
use app\core\BackendController;

class RepayController extends BackendController
{
    
    /**
     * 还款
     * step1:还款申请
     */
    public function actionApply()
    {
        return $this->render('apply');
    }
    
    /**
     * 还款
     * step2:还款复核
     */
    public function actionCheck()
    {
        return $this->render('check');
    }
    
    /**
     * 还款
     * step3:还款确认- 执行还款操作
     */
    public function actionRun()
    {
        return $this->render('run');
    }
    
    /**
     * 还款查询
     */
    public function actionFind()
    {
        return $this->render('find');
    }
    
    /**
     * 统计报表
     */
    public function actionReport()
    {
        return $this->render('report');
    }
    
}