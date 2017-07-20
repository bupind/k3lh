<?php

namespace backend\controllers;

use Yii;
use backend\models\PpuAmbient;
use backend\models\PpuAmbientSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;

/**
 * PpuAmbientController implements the CRUD actions for PpuAmbient model.
 */
class PpuAmbientController extends AppController
{
    /**
     * @inheritdoc
     */

    public $powerPlantModel;

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

        if (in_array($action->id, ['index'])) {
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
     * Lists all PpuAmbient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpuAmbientSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new PpuAmbient();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $this->redirect(['ppu-ambient/index', '_ppId' => $model->power_plant_id]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single PpuAmbient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $startDate = new \DateTime();
        $startDate->setDate($model->ppua_year - 1, 7, 1);

        return $this->render('view', [
            'model' => $model,
            'startDate' => $startDate,
        ]);
    }

    /**
     * Creates a new PpuAmbient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuAmbient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PpuAmbient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PpuAmbient model.
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

    public function actionExport($id) {

        $searchModel = new PpuAmbientSearch();

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the PpuAmbient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuAmbient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuAmbient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
