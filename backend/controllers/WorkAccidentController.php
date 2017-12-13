<?php

namespace backend\controllers;

use backend\models\Codeset;
use Yii;
use backend\models\WorkAccident;
use backend\models\WorkAccidentSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PowerPlant;
use common\vendor\AppConstants;


/**
 * WorkAccidentController implements the CRUD actions for WorkAccident model.
 */
class WorkAccidentController extends AppController
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
     * Lists all WorkAccident models.
     * @return mixed
     */
    public function actionIndex($wat)
    {
        $searchModel = new WorkAccidentSearch();
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'title' => $title,
            'wat' => $wat,
        ]);
    }

    /**
     * Displays a single WorkAccident model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $wat)
    {
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'wat' => $wat,
            'title' => $title,
        ]);
    }

    /**
     * Creates a new WorkAccident model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($wat)
    {
        $model = new WorkAccident();
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id, 'wat' => $wat]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'title' => $title,
                'wat' => $wat,
            ]);
        }
    }

    /**
     * Updates an existing WorkAccident model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $wat)
    {
        $model = $this->findModel($id);
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id, 'wat' => $wat]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'title' => $title,
                'wat' => $wat,
            ]);
        }
    }

    /**
     * Deletes an existing WorkAccident model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $wat)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', '_ppId' => $model->power_plant_id, 'wat' => $wat]);
    }

    public function actionExport($id) {

        $searchModel = new WorkAccidentSearch();
        $searchModel->power_plant_id = $this->powerPlantModel->id;

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the WorkAccident model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkAccident the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkAccident::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
