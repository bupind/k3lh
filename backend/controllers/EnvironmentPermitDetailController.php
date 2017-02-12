<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/2/2017
 * Time: 12:21 PM
 */

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;

use backend\models\EnvironmentPermitDetail;

class EnvironmentPermitDetailController extends AppController
{
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
     * Finds the EnvironmentPermitDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnvironmentPermitDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = EnvironmentPermitDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes an existing EnvironmentPermitDetail model.
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