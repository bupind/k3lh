<?php

namespace backend\controllers;

use backend\models\Ppa;
use backend\models\PpaMonth;
use backend\models\PpaSetupPermit;
use backend\models\PpaSetupPermitSearch;
use common\vendor\AppConstants;
use Yii;
use yii\base\Model;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * PpaSetupPermitController implements the CRUD actions for PpaSetupPermit model.
 */
class PpaSetupPermitController extends AppController {
    
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
     * Lists all PpaSetupPermit models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaSetupPermitSearch();
        $searchModel->ppa_id = $this->ppaModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppaModel' => $this->ppaModel
        ]);
    }
    
    /**
     * Displays a single PpaSetupPermit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaSetupPermit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaSetupPermit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaSetupPermit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaSetupPermit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        
        $model = new PpaSetupPermit();
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaModel->ppa_year - 1, 7, 1);
        $ppaMonthModels = [];
        
        for ($i = 0; $i < 12; $i++) {
            $ppaMonthModels[] = new PpaMonth();
        }
        
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['create', 'ppaId' => $model->ppa_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppaModel' => $this->ppaModel,
                'startDate' => $startDate,
                'ppaMonthModels' => $ppaMonthModels
            ]);
        }
    }
    
    /**
     * Updates an existing PpaSetupPermit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->ppaModel = $model->ppa;
        $ppaMonthModels = $model->ppaMonths;
        
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaModel->ppa_year - 1, 7, 1);
        
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppaModel' => $this->ppaModel,
                'startDate' => $startDate,
                'ppaMonthModels' => $ppaMonthModels
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaSetupPermit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $ppa = $model->ppa;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        return $this->redirect(['index', 'ppaId' => $ppa->id]);
    }
}
