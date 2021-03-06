<?php

namespace backend\controllers;

use backend\models\MaturityLevelQuestion;
use backend\models\MaturityLevelDetail;
use backend\models\MaturityLevelTitle;
use backend\models\MaturityLevel;
use backend\models\MaturityLevelSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * MaturityLevelController implements the CRUD actions for MaturityLevel model.
 */
class MaturityLevelController extends AppController {
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
        return $this->rbac();
    }
    
    /**
     * Lists all MaturityLevel models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MaturityLevelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single MaturityLevel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $detailModels = $model->maturityLevelDetails;
        $maturityLevelTitles = MaturityLevelTitle::find()->all();
        
        return $this->render('view', [
            'model' => $model,
            'detailModels' => $detailModels,
            'maturityLevelTitles' => $maturityLevelTitles
        ]);
    }
    
    /**
     * Finds the MaturityLevel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaturityLevel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MaturityLevel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new MaturityLevel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new MaturityLevel();
        $detailModels = [];
        $maturityLevelTitles = MaturityLevelTitle::find()->all();
        $questionCount = MaturityLevelQuestion::find()->count();
        
        for ($i=0; $i<$questionCount; $i++) {
            $detailModels[] = new MaturityLevelDetail();
        }
    
        $requestData = Yii::$app->request->post();
        
        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'detailModels' => $detailModels,
                'maturityLevelTitles' => $maturityLevelTitles
            ]);
        }
    }
    
    /**
     * Updates an existing MaturityLevel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $detailModels = $model->maturityLevelDetails;
        $maturityLevelTitles = MaturityLevelTitle::find()->all();
        $questionCount = MaturityLevelQuestion::find()->count();
    
        for ($i=count($detailModels); $i<$questionCount; $i++) {
            $detailModels[$i] = new MaturityLevelDetail();
        }
        
        $requestData = Yii::$app->request->post();
        
        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'detailModels' => $detailModels,
                'maturityLevelTitles' => $maturityLevelTitles
            ]);
        }
    }
    
    public function actionExport($id) {
        $model = $this->findModel($id);
        $searchModel = new MaturityLevelSearch();
        
        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    /**
     * Deletes an existing MaturityLevel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        return $this->redirect(['index']);
    }
}
