<?php

namespace backend\controllers;

use backend\models\ProjectTracking;
use backend\models\ProjectTrackingDetail;
use backend\models\ProjectTrackingDetailSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;

/**
 * ProjectTrackingDetailController implements the CRUD actions for ProjectTrackingDetail model.
 */
class ProjectTrackingDetailController extends AppController {
    
    /* @var $projectTrackingModel \backend\models\ProjectTracking */
    public $projectTrackingModel;
    
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
            $projectTrackingId = Yii::$app->request->get('ptId');
            if (($projectTracking = ProjectTracking::findOne($projectTrackingId)) !== null) {
                $this->projectTrackingModel = $projectTracking;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all ProjectTrackingDetail models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProjectTrackingDetailSearch();
        $searchModel->project_tracking_id = $this->projectTrackingModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'projectTrackingModel' => $this->projectTrackingModel
        ]);
    }
    
    /**
     * Displays a single ProjectTrackingDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the ProjectTrackingDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectTrackingDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ProjectTrackingDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new ProjectTrackingDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ProjectTrackingDetail();
        $model->project_tracking_id = $this->projectTrackingModel->id;
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'projectTrackingModel' => $this->projectTrackingModel,
            ]);
        }
    }
    
    /**
     * Updates an existing ProjectTrackingDetail model.
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
            return $this->render('update', [
                'model' => $model,
                'projectTrackingModel' => $model->projectTracking,
            ]);
        }
    }
    
    /**
     * Deletes an existing ProjectTrackingDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
    
        return $this->redirect(['index', 'ptId' => $model->project_tracking_id]);
    }
}
