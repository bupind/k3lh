<?php

namespace backend\controllers;

use Yii;
use backend\models\SloGenerator;
use backend\models\SloGeneratorSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PowerPlant;
use common\vendor\AppConstants;

/**
 * SloGeneratorController implements the CRUD actions for SloGenerator model.
 */
class SloGeneratorController extends AppController
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
     * Lists all SloGenerator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SloGeneratorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single SloGenerator model.
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
     * Creates a new SloGenerator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SloGenerator();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Updates an existing SloGenerator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Deletes an existing SloGenerator model.
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

        $searchModel = new SloGeneratorSearch();

        if ($searchModel->load(Yii::$app->request->post()) && $searchModel->export()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        } else {
            return $this->render('export', [
                'searchModel' => $searchModel,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Finds the SloGenerator model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SloGenerator the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SloGenerator::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
