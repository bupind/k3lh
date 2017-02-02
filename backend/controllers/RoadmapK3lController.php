<?php

namespace backend\controllers;

use backend\models\Codeset;
use backend\models\PowerPlant;
use backend\models\RoadmapK3l;
use backend\models\RoadmapK3lSearch;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * RoadmapK3lController implements the CRUD actions for roadmap-k3l model.
 */
class RoadmapK3lController extends AppController {
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
     * Lists all roadmap-k3l models.
     * @return mixed
     */
    public function actionIndex($rmt = null) {
        
        if (is_null($rmt)) {
            $rmt = AppConstants::FORM_TYPE_K3;
        }
        
        $rmt = strtoupper($rmt);
        
        $searchModel = new RoadmapK3lSearch();
        $searchModel->form_type_code = $rmt;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $rmt);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => $title,
            'rmt' => $rmt
        ]);
    }
    
    /**
     * Displays a single roadmap-k3l model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the roadmap-k3l model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoadmapK3l the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = RoadmapK3l::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new roadmap-k3l model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($rmt = null) {
        
        if (is_null($rmt)) {
            $rmt = AppConstants::FORM_TYPE_K3;
        }
        
        $rmt = strtoupper($rmt);
        $model = new RoadmapK3l();
        $model->form_type_code = $rmt;
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $rmt);
            $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->power_plant_id)) {
                $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                    'where' => [
                        ['sector_id' => $model->sector_id]
                    ]
                ]);
            }
            
            return $this->render('create', [
                'model' => $model,
                'title' => $title,
                'powerPlantList' => $powerPlantList
            ]);
        }
    }
    
    /**
     * Updates an existing roadmap-k3l model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
                
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
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
     * Deletes an existing roadmap-k3l model.
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
