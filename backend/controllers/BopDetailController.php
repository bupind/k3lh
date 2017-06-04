<?php

namespace backend\controllers;

use Yii;
use backend\models\BopDetail;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * BopDetailController implements the CRUD actions for BopDetail model.
 */
class BopDetailController extends AppController
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
     * Lists all BopDetail models.
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
        if (($model = BopDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
