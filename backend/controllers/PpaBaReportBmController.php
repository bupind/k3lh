<?php

namespace backend\controllers;

use Yii;
use backend\models\PpaBa;
use backend\models\PpaBaConcentration;
use backend\models\PpaBaReportBm;
use backend\models\PpaBaReportBmSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * PpaBaReportBmController implements the CRUD actions for PpaBaReportBm model.
 */
class PpaBaReportBmController extends AppController {
    
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
        
        return $this->rbac();
    }
    
    /**
     * Lists all PpaBaReportBm models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaBaReportBmSearch();
        $dataProvider = $searchModel->searchPpaBa(Yii::$app->request->queryParams, $this->ppaBaModel->id);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppaBaModel' => $this->ppaBaModel
        ]);
    }
    
    /**
     * Displays a single PpaBaReportBm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaBaReportBm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaBaReportBm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaBaReportBm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaBaReportBm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PpaBaReportBm();
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaBaModel->ppaba_year - 1, 7, 1);
    
        $ppaBaConcentrationModels = [];
    
        for ($i = 0; $i < 12; $i++) {
            $ppaBaConcentrationModels[] = new PpaBaConcentration();
        
        }
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaBaConcentrationModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['create', 'ppaBaId' => $this->ppaBaModel->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppaBaModel' => $this->ppaBaModel,
                'startDate' => $startDate,
                'ppaBaConcentrationModels' => $ppaBaConcentrationModels,
            ]);
        }
    }
    
    /**
     * Updates an existing PpaBaReportBm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $ppaBaModel = $model->ppaBaMonitoringPoint->ppaBa;
    
        $startDate = new \DateTime();
        $startDate->setDate($ppaBaModel->ppaba_year - 1, 7, 1);
    
        $ppaBaConcentrationModels = $model->ppaBaConcentrations;
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaBaConcentrationModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppaBaModel' => $ppaBaModel,
                'startDate' => $startDate,
                'ppaBaConcentrationModels' => $ppaBaConcentrationModels,
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaBaReportBm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $ppaBa = $model->ppaBaMonitoringPoint->ppaBa;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
    
        return $this->redirect(['index', 'ppaBaId' => $ppaBa->id]);
    }
}
