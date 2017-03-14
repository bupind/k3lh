<?php

namespace backend\controllers;

use Yii;
use backend\models\PpuAmbient;
use backend\models\PpuAmbientSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\PowerPlant;

/**
 * PpuAmbientController implements the CRUD actions for PpuAmbient model.
 */
class PpuAmbientController extends AppController
{
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
        return $this->rbac();
    }

    /**
     * Lists all PpuAmbient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpuAmbientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new PpuAmbient();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $this->redirect('ppu-ambient/index');
        }

        $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
        if (!is_null($model->power_plant_id)) {
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'powerPlantList' => $powerPlantList,
        ]);
    }

    /**
     * Displays a single PpuAmbient model.
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
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);

            return $this->render('update', [
                'model' => $model,
                'powerPlantList' => $powerPlantList,
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
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index']);
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
