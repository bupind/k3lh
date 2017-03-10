<?php

namespace backend\controllers;

use backend\models\PpaPollutionLoadDecrease;
use backend\models\PpaPollutionLoadDecreaseSearch;
use backend\models\PpaPollutionLoadDecreaseYear;
use backend\models\Ppa;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * PpaPollutionLoadDecreaseController implements the CRUD actions for PpaPollutionLoadDecrease model.
 */
class PpaPollutionLoadDecreaseController extends AppController {
    
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
     * Lists all PpaPollutionLoadDecrease models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaPollutionLoadDecreaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppaModel' => $this->ppaModel
        ]);
    }
    
    /**
     * Displays a single PpaPollutionLoadDecrease model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaPollutionLoadDecrease model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaPollutionLoadDecrease the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaPollutionLoadDecrease::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaPollutionLoadDecrease model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PpaPollutionLoadDecrease();
    
        $startYear = new \DateTime();
        $startYear->setDate($this->ppaModel->ppa_year - 3, 1, 1);
        
        $ppaLDYearModels = [];
        for ($i=0; $i<4; $i++) {
            $ppaLDYearModels[] = new PpaPollutionLoadDecreaseYear();
        }
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaLDYearModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppaModel' => $this->ppaModel,
                'startYear' => $startYear,
                'ppaLDYearModels' => $ppaLDYearModels
            ]);
        }
    }
    
    /**
     * Updates an existing PpaPollutionLoadDecrease model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
    
        $startYear = new \DateTime();
        $startYear->setDate($model->ppa->ppa_year - 3, 1, 1);
    
        $ppaLDYearModels = $model->ppaPollutionLoadDecreaseYears;
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaLDYearModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppaModel' => $model->ppa,
                'startYear' => $startYear,
                'ppaLDYearModels' => $ppaLDYearModels
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaPollutionLoadDecrease model.
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
