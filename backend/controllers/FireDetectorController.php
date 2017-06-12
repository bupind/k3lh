<?php

namespace backend\controllers;
use backend\models\FdDetail;
use yii\base\Model;
use Yii;
use backend\models\FireDetector;
use backend\models\FireDetectorSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;

/**
 * FireDetectorController implements the CRUD actions for FireDetector model.
 */
class FireDetectorController extends AppController
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

        if (in_array($action->id, ['index', 'create', 'update'])) {
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
     * Lists all FireDetector models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FireDetectorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single FireDetector model.
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
     * Creates a new FireDetector model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FireDetector();

        $monthModel = [];

        for($i = 0; $i<12; $i++){
            $monthModel[] = new FdDetail();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($monthModel, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'monthModel' => $monthModel,
            ]);
        }
    }

    /**
     * Updates an existing FireDetector model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $monthModel = $model->fdDetails;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'monthModel' => $monthModel,
            ]);
        }
    }

    /**
     * Deletes an existing FireDetector model.
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

    /**
     * Finds the FireDetector model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FireDetector the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FireDetector::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
