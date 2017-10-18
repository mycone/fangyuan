<?php
namespace app\modules\rbac\admin\controllers;

use Yii;
use app\core\BackendController;
use app\models\Admin;
use app\models\AdminSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Event;
use app\core\AjaxValidationTrait;

class DefaultController extends BackendController 
{
    use AjaxValidationTrait;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * 用户列表
     */
    public function actionIndex() {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * 创建用户
     */
    public function actionCreate() {
        $model = new Admin();
        $model->setScenario('create');
        $this->performAjaxValidation($model);
        if($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect(['view','id'=>$model->id]);
        }
        return $this->render('create',[
            'model' => $model,
        ]);
    }
    
    /**
     * 查看用户信息
     */
    public function actionView($id) {
        Event::on(Admin::className(), Admin::EVENT_AFTER_FIND, [new Admin(),'eventAfterHandler']);
        $model = $this->getModel($id);
        return $this->render('view',[
            'model' => $model,
        ]);
    }
    
    /**
     * 更新用户信息
     */
    public function actionUpdate($id) {
        $model = $this->getModel($id);
        $model->setScenario('update');
        $this->performAjaxValidation($model);
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view','id'=>$model->id]);
        }
        return $this->render('update',[
            'model' => $model,
        ]);
    }
    
    /**
     * 删除用户信息
     */
    public function actionDelete($id) {
        $this->getModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    /**
     * 获取模型
     * @param int $id
     * @throws NotFoundHttpException
     * @return \yii\db\static
     */
    protected function getModel($id) {
        $model = Admin::findOne($id);
        if(null !== $model) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('请求的页面不存在');
        }
    }
}
