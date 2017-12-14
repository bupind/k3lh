<?php

namespace backend\controllers;

use Yii;
use backend\models\MaturityLevelK3l;
use backend\models\MaturityLevelK3lSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\MaturityLevelK3lTitle;
use yii\base\Model;
use backend\models\MaturityLevelK3lQuestion;
use backend\models\MaturityLevelK3lDetail;
use backend\models\PowerPlant;

/**
 * MaturityLevelK3lController implements the CRUD actions for MaturityLevelK3l model.
 */
class MaturityLevelK3lController extends AppController
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
     * Lists all MaturityLevelK3l models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaturityLevelK3lSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single MaturityLevelK3l model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $detailModels = $model->maturityLevelK3lDetails;
        $maturityLevelK3lTitles = MaturityLevelK3lTitle::find()->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'detailModels' => $detailModels,
            'maturityLevelK3lTitles' => $maturityLevelK3lTitles,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Creates a new MaturityLevelK3l model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaturityLevelK3l();
        $detailModels = [];
        $maturityLevelK3lTitles = MaturityLevelK3lTitle::find()->all();
        $questionCount = MaturityLevelK3lQuestion::find()->count();

        for ($i=0; $i<$questionCount; $i++) {
            $detailModels[] = new MaturityLevelK3lDetail();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) && $model->saveTransactional()) {
            return $this->redirect(['view', 'id' => $model->id, '_ppId' => $model->power_plant_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'detailModels' => $detailModels,
                'maturityLevelK3lTitles' => $maturityLevelK3lTitles,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Updates an existing MaturityLevelK3l model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $detailModels = $model->maturityLevelK3lDetails;
        $maturityLevelK3lTitles = MaturityLevelK3lTitle::find()->all();
        $questionCount = MaturityLevelK3lQuestion::find()->count();

        for ($i=count($detailModels); $i<$questionCount; $i++) {
            $detailModels[$i] = new MaturityLevelK3lDetail();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) && $model->saveTransactional()) {
            return $this->redirect(['view', 'id' => $model->id, '_ppId' => $model->power_plant_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'detailModels' => $detailModels,
                'maturityLevelK3lTitles' => $maturityLevelK3lTitles,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Deletes an existing MaturityLevelK3l model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', '_ppId' => $this->findModel($id)->power_plant_id]);
    }

    public function actionExport($id) {
        $model = $this->findModel($id);
        $searchModel = new MaturityLevelK3lSearch();

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the MaturityLevelK3l model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaturityLevelK3l the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaturityLevelK3l::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
