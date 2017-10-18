<?php
/**
 * 权限管理
 * @author ChenHao <dzswchenhao@126.com>
 * @since 1.0
 */

namespace app\modules\rbac\admin\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;
use app\modules\rbac\models\Permission;
use app\core\BackendController;
use app\helpers\ArrayHelper;

class PermissionController extends BackendController
{
    /**
     * 权限列表
     */
    public function actionIndex() {
        $result=[];
        $rows = Permission::find()->orderBy(['sort_num'=>SORT_ASC])->all();
        foreach($rows as $row) {
            $result[$row->category][]=$row;
        }
        
        return $this->render('index', [
            //'basicsDataProvider' =>$this->getDataRrovider($result, Permission::Category_Basic),
            'controllersDataProvider' => $this->getDataRrovider($result, Permission::Category_Controller),
            'systemsDataProvider' => $this->getDataRrovider($result, Permission::Category_System),
        ]);
    }
    
    private function getDataRrovider($result,$category)
    {
        $provider = new ArrayDataProvider([
            'allModels'=>ArrayHelper::getValue($result, $category,[]),
            'key'=>'id',
            'pagination' => [
                'pageSize' => -1,
            ]
        ]);
        return $provider;
    }
    
    /**
     * Creates a new Permission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Permission();
         
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing Permission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing Permission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
    
        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Permission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Permission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Permission::findOne(['id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}