<?php

namespace backend\controllers;

use Yii;
use backend\models\LoginHistory;
use backend\models\LoginHistorySearch;
use backend\controllers\AppController;
use common\vendor\AppConstants;
use yii\filters\VerbFilter;

/**
 * LoginHistoryController implements the CRUD actions for LoginHistory model.
 */
class LoginHistoryController extends AppController {

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
     * Lists all LoginHistory models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LoginHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionDeleteAll() {
        LoginHistory::deleteAll();

        Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        return $this->redirect(['index']);
    }

}
