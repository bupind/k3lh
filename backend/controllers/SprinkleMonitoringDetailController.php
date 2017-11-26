<?php

namespace backend\controllers;

use Yii;
use backend\models\SprinkleMonitoringDetail;
use backend\models\SprinkleMonitoringDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;


/**
 * SprinkleMonitoringDetailController implements the CRUD actions for SprinkleMonitoringDetail model.
 */
class SprinkleMonitoringDetailController extends AppController
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
     * Lists all SprinkleMonitoringDetail models.
     * @return mixed
     */
    public function actionIndex($smId)
    {
        $searchModel = new SprinkleMonitoringDetailSearch();
        $searchModel->sprinkle_monitoring_id = $smId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'smId' => $smId,
        ]);
    }

    /**
     * Displays a single SprinkleMonitoringDetail model.
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
     * Creates a new SprinkleMonitoringDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($smId)
    {
        $model = new SprinkleMonitoringDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->sprinkle_monitoring_id = $smId;
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'smId' => $smId,
            ]);
        }
    }

    /**
     * Updates an existing SprinkleMonitoringDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $smId)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'smId' => $smId,
            ]);
        }
    }

    /**
     * Deletes an existing SprinkleMonitoringDetail model.
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

        return $this->redirect(['index', '_ppId' => $model->sprinkleMonitoring->power_plant_id, 'smId' => $model->sprinkle_monitoring_id]);
    }

    /**
     * Finds the SprinkleMonitoringDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SprinkleMonitoringDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SprinkleMonitoringDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
