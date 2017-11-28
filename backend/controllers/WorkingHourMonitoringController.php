<?php

namespace backend\controllers;

use backend\models\PowerPlant;
use backend\models\WhmMonth;
use Yii;
use backend\models\WorkingHourMonitoring;
use backend\models\WorkingHourMonitoringSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * WorkingHourMonitoringController implements the CRUD actions for WorkingHourMonitoring model.
 */
class WorkingHourMonitoringController extends AppController
{
    public $powerPlantModel;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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

        if (in_array($action->id, ['index', 'create', 'update', 'export'])) {
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
     * Lists all WorkingHourMonitoring models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkingHourMonitoringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single WorkingHourMonitoring model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WorkingHourMonitoring model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkingHourMonitoring();
        $whmMonths = [];
        for($i=0; $i<12; $i++){
            $whmMonths[] = new WhmMonth();
        }

        $requestData = Yii::$app->request->post();

        if (Model::loadMultiple($whmMonths, $requestData) && $model->load($requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'whmMonths' => $whmMonths
            ]);
        }
    }

    /**
     * Updates an existing WorkingHourMonitoring model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $whmMonths = $model->whmMonths;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'whmMonths' => $whmMonths,
            ]);
        }
    }

    /**
     * Deletes an existing WorkingHourMonitoring model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', '_ppId' => $model->power_plant_id]);
    }

    public function actionExport() {

        $searchModel = new WorkingHourMonitoringSearch();
        $searchModel->power_plant_id = $this->powerPlantModel->id;

        if ($searchModel->export()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the WorkingHourMonitoring model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkingHourMonitoring the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkingHourMonitoring::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
