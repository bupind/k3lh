<?php

namespace backend\controllers;

use backend\models\Ppa;
use backend\models\PpaInletOutlet;
use backend\models\PpaReportBm;
use backend\models\PpaReportBmSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * PpaReportBmController implements the CRUD actions for PpaReportBm model.
 */
class PpaReportBmController extends AppController {
    
    public $ppaModel;
    
    
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
            $ppaId = Yii::$app->request->get('ppaId');
            if (empty($ppaId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            
            $this->ppaModel = Ppa::findOne(['id' => $ppaId]);
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all PpaReportBm models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaReportBmSearch();
        $dataProvider = $searchModel->searchPpa(Yii::$app->request->queryParams, $this->ppaModel->id);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppaModel' => $this->ppaModel
        ]);
    }
    
    /**
     * Displays a single PpaReportBm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaReportBm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaReportBm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaReportBm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaReportBm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PpaReportBm();
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaModel->ppa_year - 1, 7, 1);
    
        $startDateOutlet = new \DateTime();
        $startDateOutlet->setDate($this->ppaModel->ppa_year - 1, 7, 1);
        
        $ppaInletOutletModels = [];
    
        for ($i = 0; $i < 12; $i++) {
            $ppaInletOutletModels[] = new PpaInletOutlet();

        }
        
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaInletOutletModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['create', 'ppaId' => $this->ppaModel->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppaModel' => $this->ppaModel,
                'startDate' => $startDate,
                'startDateOutlet' => $startDateOutlet,
                'ppaInletOutletModels' => $ppaInletOutletModels,
            ]);
        }
    }
    
    /**
     * Updates an existing PpaReportBm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $ppaModel = $model->ppaSetupPermit->ppa;
    
        $startDate = new \DateTime();
        $startDate->setDate($ppaModel->ppa_year - 1, 7, 1);
    
        $startDateOutlet = new \DateTime();
        $startDateOutlet->setDate($ppaModel->ppa_year - 1, 7, 1);
    
        $ppaInletOutletModels = $model->ppaInletOutlets;
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaInletOutletModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppaModel' => $ppaModel,
                'startDate' => $startDate,
                'startDateOutlet' => $startDateOutlet,
                'ppaInletOutletModels' => $ppaInletOutletModels,
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaReportBm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $ppa = $model->ppaSetupPermit->ppa;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        return $this->redirect(['index', 'ppaId' => $ppa->id]);
    }
}
