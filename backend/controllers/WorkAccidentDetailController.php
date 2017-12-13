<?php

namespace backend\controllers;

use Yii;
use backend\models\WorkAccidentDetail;
use backend\models\WorkAccidentDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PowerPlant;
use common\vendor\AppConstants;
use backend\models\Codeset;


/**
 * WorkAccidentDetailController implements the CRUD actions for WorkAccidentDetail model.
 */
class WorkAccidentDetailController extends AppController
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
     * Lists all WorkAccidentDetail models.
     * @return mixed
     */
    public function actionIndex($waId, $wat)
    {
        $searchModel = new WorkAccidentDetailSearch();
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);
        $searchModel->work_accident_id = $waId;
        $searchModel->wad_type = $wat;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'waId' => $waId,
            'wat' => $wat,
            'title' => $title,
        ]);
    }

    /**
     * Displays a single WorkAccidentDetail model.
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
     * Creates a new WorkAccidentDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($waId, $wat)
    {
        $model = new WorkAccidentDetail();
        $title = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $wat);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id, 'wat' => $wat]);
        } else {
            $model->work_accident_id = $waId;
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'waId' => $waId,
                'wat' => $wat,
                'title' => $title,
            ]);
        }
    }

    /**
     * Updates an existing WorkAccidentDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $waId, $wat)
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
                'waId' => $waId,
                'wat' => $wat,
                'title' => $title,
            ]);
        }
    }

    /**
     * Deletes an existing WorkAccidentDetail model.
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

        return $this->redirect(['index', '_ppId' => $model->workAccident->power_plant_id, 'waId' => $model->work_accident_id, 'wat' => $wat]);
    }

    /**
     * Finds the WorkAccidentDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkAccidentDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkAccidentDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
