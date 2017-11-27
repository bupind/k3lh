<?php

namespace backend\controllers;

use backend\models\PmdMonth;
use Yii;
use backend\models\P3kMonitoringDetail;
use backend\models\P3kMonitoringDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;
use yii\base\Model;


/**
 * P3kMonitoringDetailController implements the CRUD actions for P3kMonitoringDetail model.
 */
class P3kMonitoringDetailController extends AppController
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
     * Lists all P3kMonitoringDetail models.
     * @return mixed
     */
    public function actionIndex($pmId)
    {
        $searchModel = new P3kMonitoringDetailSearch();
        $searchModel->p3k_monitoring_id = $pmId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'pmId' => $pmId,
        ]);
    }

    /**
     * Displays a single P3kMonitoringDetail model.
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
     * Creates a new P3kMonitoringDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pmId)
    {
        $startDate = new \DateTime();
        $startDate->setDate(2017, 1, 1);
        $pmdmMonth = [];

        for ($i=0; $i<12; $i++) {
            $pmdmMonth[] = new PmdMonth();
        }
        $model = new P3kMonitoringDetail();
        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($pmdmMonth, $requestData)&& $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->p3k_monitoring_id = $pmId;
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'pmId' => $pmId,
                'startDate' => $startDate,
                'pmdmMonth' => $pmdmMonth,
            ]);
        }
    }

    /**
     * Updates an existing P3kMonitoringDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $pmId)
    {
        $model = $this->findModel($id);
        $pmdmMonth = $model->pmdMonths;

        $startDate = new \DateTime();
        $startDate->setDate(2017, 1, 1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'pmId' => $pmId,
                'startDate' => $startDate,
                'pmdmMonth' => $pmdmMonth,
            ]);
        }
    }

    /**
     * Deletes an existing P3kMonitoringDetail model.
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

        return $this->redirect(['index', '_ppId' => $model->p3kMonitoring->power_plant_id, 'pmId' => $model->p3k_monitoring_id]);
    }

    /**
     * Finds the P3kMonitoringDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return P3kMonitoringDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = P3kMonitoringDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
