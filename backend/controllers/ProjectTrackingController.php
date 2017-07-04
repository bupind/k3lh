<?php

namespace backend\controllers;

use backend\models\PowerPlant;
use backend\models\ProjectTracking;
use backend\models\ProjectTrackingDetail;
use backend\models\ProjectTrackingSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;

/**
 * ProjectTrackingController implements the CRUD actions for ProjectTracking model.
 */
class ProjectTrackingController extends AppController {
    
    /* @var $powerPlantModel \backend\models\PowerPlant */
    public $powerPlantModel;
    
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
            $powerPlantId = Yii::$app->request->get('_ppId');
            if (($powerPlant = PowerPlant::findOne($powerPlantId)) !== null) {
                $this->powerPlantModel = $powerPlant;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all ProjectTracking models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProjectTrackingSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel
        ]);
    }
    
    /**
     * Displays a single ProjectTracking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $projectTrackingDetailModel = new ProjectTrackingDetail();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'projectTrackingDetailModel' => $projectTrackingDetailModel
        ]);
    }
    
    /**
     * Finds the ProjectTracking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectTracking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ProjectTracking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new ProjectTracking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ProjectTracking();
        $model->sector_id = $this->powerPlantModel->sector_id;
        $model->power_plant_id = $this->powerPlantModel->id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel
            ]);
        }
    }
    
    /**
     * Updates an existing ProjectTracking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->powerPlantModel = $model->powerPlant;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel
            ]);
        }
    }
    
    public function actionExport($id) {
        $searchModel = new ProjectTrackingSearch();

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    /**
     * Deletes an existing ProjectTracking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        return $this->redirect(['index', '_ppId' => $model->power_plant_id]);
    }
}
