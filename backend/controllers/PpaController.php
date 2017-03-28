<?php

namespace backend\controllers;

use backend\models\Ppa;
use backend\models\PpaSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PowerPlant;
use backend\models\Codeset;

/**
 * PpaController implements the CRUD actions for Ppa model.
 */
class PpaController extends AppController {
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
     * Lists all Ppa models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $model = new Ppa();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $this->redirect(['index']);
        }
    
        $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
        if (!is_null($model->power_plant_id)) {
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);
        }
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'powerPlantList' => $powerPlantList
        ]);
    }
    
    /**
     * Displays a single Ppa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE);
        
        return $this->render('view', [
            'model' => $model,
            'startDate' => $startDate,
            'questionGroups' => $questionGroups
        ]);
    }
    
    /**
     * Finds the Ppa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ppa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Ppa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new Ppa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Ppa();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing Ppa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
    
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);
            
            return $this->render('update', [
                'model' => $model,
                'powerPlantList' => $powerPlantList
            ]);
        }
    }
    
    /**
     * Deletes an existing Ppa model.
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
    
    public function actionPollutionLoad($id) {
        $model = $this->findModel($id);
        
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
        
        return $this->render('pollution-load', [
            'model' => $model,
            'startDate' => $startDate
        ]);
    }
    
    public function actionPollutionLoadActual($id) {
        $model = $this->findModel($id);
        
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa_year - 1, 7, 1);
        
        return $this->render('pollution-load-actual', [
            'model' => $model,
            'startDate' => $startDate
        ]);
    }
}
