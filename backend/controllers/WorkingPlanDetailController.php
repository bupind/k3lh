<?php

namespace backend\controllers;

use backend\models\WorkingPlanDetail;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\helpers\Json;

/**
 * WorkingPlanDetailController implements the CRUD actions for WorkingPlanDetail model.
 */
class WorkingPlanDetailController extends AppController {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }
    
    /**
     * Finds the WorkingPlanDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkingPlanDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkingPlanDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Deletes an existing WorkingPlanDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAjaxDelete() {
        $requestData = Yii::$app->request->post();
        $id = $requestData['id'];
        if ($this->findModel($id)->delete()) {
            return Json::encode(true);
        }
    
        return Json::encode(false);
    }
}
