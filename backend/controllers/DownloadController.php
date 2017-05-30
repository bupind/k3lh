<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * DownloadController implements the CRUD actions for Download model.
 */
class DownloadController extends AppController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete-all' => ['POST'],
                ],
            ],
        ];
    }
    
//    public function beforeAction($action) {
//        parent::beforeAction($action);
//        return $this->rbac();
//    }

    /**
     * Lists all Download models.
     * @return mixed
     */
    public function actionExcel($filename = null) {
        if ($filename !== null) {
            $file = Yii::getAlias(AppConstants::THEME_EXCEL_EXPORT_DIR) . $filename;
            if (file_exists($file)) {
                Yii::$app->response->on(Response::EVENT_AFTER_SEND, function ($event){
                    unlink($event->data);
                }, $file);
                Yii::$app->response->sendFile($file);
                Yii::$app->session->setFlash('success', AppConstants::MSG_DOWNLOAD_SUCCESS);
            } else {
                Yii::$app->session->setFlash('danger', AppConstants::ERR_DOWNLOAD_FAILED);
            }
            
//            return $this->render('index', [
//                'filename' => $filename
//            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
