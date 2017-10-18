<?php
/**
 * 权证办理
 * @author chenhao
 */
namespace app\modules\fangyuan\admin\controllers;

use Yii;
use app\core\BackendController;

class WarrantController extends BackendController
{
    
    /**
     * 客户合同打印
     */
    public function actionPrint()
    {
        return $this->render('print');
    }
    
    /**
     * 档案管理
     */
    public function actionArchiv()
    {
        return $this->render('archiv');
    }
    
    /**
     * 担保物管理
     */
    public function actionGuaranty()
    {
        return $this->render('guaranty');
    }
    
}