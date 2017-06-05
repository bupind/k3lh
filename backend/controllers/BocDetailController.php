<?php

namespace backend\controllers;

use Yii;
use backend\models\BocDetail;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * BocDetailController implements the CRUD actions for BocDetail model.
 */
class BocDetailController extends AppController
{
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
     * Lists all BocDetail models.
     * @return mixed
     */
    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }

    public function actionAjaxDelete() {
        $requestData = Yii::$app->request->post();
        $id = $requestData['id'];
        if ($this->findModel($id)->delete()) {
            return Json::encode(true);
        }

        return Json::encode(false);
    }

    protected function findModel($id)
    {
        if (($model = BocDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
