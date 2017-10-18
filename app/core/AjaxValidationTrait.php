<?php
/**
 * 公共Trait
 * 用于Model在控制器中验证返回
 * @author ChenHao
 * 
 * 示例：
 * ```php
 * class SecurityController extends \yii\base\Controller 
 * {
 *     //USE Trait
 *     use AjaxValidationTrait;
 *     public function actionLogin()
 *     {
 *         if (!Yii::$app->user->isGuest) {
 *             $this->goHome();
 *         }
 *         // @var LoginForm $model
 *         $model = Yii::createObject(LoginForm::className());
 *         
 *         //AjaxValidation
 *         $this->performAjaxValidation($model);
 *         
 *         if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
 *             return $this->goBack();
 *         }
 *         
 *         return $this->render('login', [
 *             'model'  => $model,
 *             'module' => $this->module,
 *         ]);
 *     }
 * 
 * }
 * ```php
 */

namespace app\core;

use Yii;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * @author ChenHao <dzswchenhao@126.com>
 */
trait AjaxValidationTrait
{
    /**
     * Performs ajax validation.
     *
     * @param Model $model
     *
     * @throws \yii\base\ExitException
     */
    protected function performAjaxValidation(Model $model)
    {
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            echo json_encode(ActiveForm::validate($model));
            Yii::$app->end();
        }
    }
}
