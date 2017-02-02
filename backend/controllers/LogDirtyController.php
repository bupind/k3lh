<?php

namespace backend\controllers;

use Yii;
use backend\models\LogDirty;
use backend\models\LogDirtySearch;
use backend\controllers\AppController;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;

/**
 * LogDirtyController implements the CRUD actions for LogDirty model.
 */
class LogDirtyController extends AppController {

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
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }

    /**
     * Lists all LogDirty models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LogDirtySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionDeleteAll() {
        LogDirty::deleteAll();

        Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        return $this->redirect(['index']);
    }

}
