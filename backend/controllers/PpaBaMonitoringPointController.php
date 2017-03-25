<?php

namespace backend\controllers;

use backend\models\PpaBa;
use backend\models\PpaBaMonth;
use backend\models\PpaBaMonitoringPoint;
use backend\models\PpaBaMonitoringPointSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * PpaBaMonitoringPointController implements the CRUD actions for PpaBaMonitoringPoint model.
 */
class PpaBaMonitoringPointController extends AppController {
    
    /* @var $ppaBaModel PpaBa */
    public $ppaBaModel;
    
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
        
        if (in_array($action->id, ['index', 'create'])) {
            $ppaBaId = Yii::$app->request->get('ppaBaId');
            if (empty($ppaBaId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            
            $this->ppaBaModel = PpaBa::findOne(['id' => $ppaBaId]);
        }
        
        return true;
//        return $this->rbac();
    }
    
    /**
     * Lists all PpaBaMonitoringPoint models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaBaMonitoringPointSearch();
        $searchModel->ppa_ba_id = $this->ppaBaModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppaBaModel' => $this->ppaBaModel
        ]);
    }
    
    /**
     * Displays a single PpaBaMonitoringPoint model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaBaMonitoringPoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaBaMonitoringPoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaBaMonitoringPoint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaBaMonitoringPoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PpaBaMonitoringPoint();
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaBaModel->ppaba_year - 1, 7, 1);
        $ppaBaMonthModels = [];
    
        for ($i = 0; $i < 12; $i++) {
            $ppaBaMonthModels[] = new PpaBaMonth();
        }
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaBaMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['create', 'ppaBaId' => $model->ppa_ba_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppaBaModel' => $this->ppaBaModel,
                'startDate' => $startDate,
                'ppaBaMonthModels' => $ppaBaMonthModels
            ]);
        }
    }
    
    /**
     * Updates an existing PpaBaMonitoringPoint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->ppaBaModel = $model->ppaBa;
        $ppaBaMonthModels = $model->ppaBaMonths;
    
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaBaModel->ppaba_year - 1, 7, 1);
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaBaMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppaBaModel' => $this->ppaBaModel,
                'startDate' => $startDate,
                'ppaBaMonthModels' => $ppaBaMonthModels
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaBaMonitoringPoint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
}
