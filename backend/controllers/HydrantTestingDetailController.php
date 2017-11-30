<?php

namespace backend\controllers;

use backend\models\HtdMonth;
use Yii;
use backend\models\HydrantTestingDetail;
use backend\models\HydrantTestingDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PowerPlant;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * HydrantTestingDetailController implements the CRUD actions for HydrantTestingDetail model.
 */
class HydrantTestingDetailController extends AppController
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
     * Lists all HydrantTestingDetail models.
     * @return mixed
     */
    public function actionIndex($htId)
    {
        $searchModel = new HydrantTestingDetailSearch();
        $searchModel->hydrant_testing_id = $htId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'htId' => $htId
        ]);
    }

    /**
     * Displays a single HydrantTestingDetail model.
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
     * Creates a new HydrantTestingDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($htId)
    {
        $model = new HydrantTestingDetail();

        $htdMonths = [];
        for($i=0; $i<12; $i++){
            $htdMonths[] = new HtdMonth();
        }

        $startDate = new \DateTime();
        $startDate->setDate(2017, 1, 1);


        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($htdMonths, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->hydrant_testing_id = $htId;
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'htId' => $htId,
                'htdMonths' => $htdMonths,
                'startDate' => $startDate,

            ]);
        }
    }

    /**
     * Updates an existing HydrantTestingDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $htId)
    {
        $model = $this->findModel($id);
        $htdMonths = $model->htdMonths;

        $startDate = new \DateTime();
        $startDate->setDate(2017, 1, 1);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'htId' => $htId,
                'htdMonths' => $htdMonths,
                'startDate' => $startDate,
            ]);
        }
    }

    /**
     * Deletes an existing HydrantTestingDetail model.
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

        return $this->redirect(['index', '_ppId' => $model->hydrantTesting->power_plant_id, 'ksId' => $model->hydrant_testing_id]);
    }

    /**
     * Finds the HydrantTestingDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HydrantTestingDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HydrantTestingDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
