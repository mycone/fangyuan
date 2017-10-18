<?php
/**
 * 放款记账
 * @author chenhao
 */
namespace app\modules\fangyuan\admin\controllers;

use Yii;
use app\core\BackendController;

class LoanController extends BackendController
{
    
    /**
     * 财务审核
     */
    public function actionCheck()
    {
        return $this->render('check');
    }
    
    /**
     * 财务放款（执行放款）
     */
    public function actionExe()
    {
        return $this->render('exe');
    }
    
    /**
     * 财务记账
     */
    public function actionTally()
    {
        return $this->render('tally');
    }
    
}