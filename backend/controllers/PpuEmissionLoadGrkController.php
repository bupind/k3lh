<?php

namespace backend\controllers;

use backend\models\PpuEmissionLoadGrkCalc;
use Yii;
use backend\models\PpuEmissionLoadGrk;
use backend\models\PpuEmissionLoadGrkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Ppu;
use yii\base\Model;

/**
 * PpuEmissionLoadGrkController implements the CRUD actions for PpuEmissionLoadGrk model.
 */
class PpuEmissionLoadGrkController extends AppController
{
    public $ppuModel;
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

        if (in_array($action->id, ['index', 'create'])) {
            $ppuId = Yii::$app->request->get('ppuId');
            if (empty($ppuId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->ppuModel = Ppu::findOne(['id' => $ppuId]);
        }

        return true;
    }

    /**
     * Lists all PpuEmissionLoadGrk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpuEmissionLoadGrkSearch();
        $dataProvider = $searchModel->searchPpu(Yii::$app->request->queryParams, $this->ppuModel->id);

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpuEmissionLoadGrk model.
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
     * Creates a new PpuEmissionLoadGrk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuEmissionLoadGrk();

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 2, 7, 1);

        $ppuCalc = [];

        for ($i = 0; $i < 2; $i++) {
            $ppuCalc[] = new PpuEmissionLoadGrkCalc();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuCalc, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'ppuCalc' => $ppuCalc,
                'startDate' => $startDate,
                'ppuModel' => $this->ppuModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PpuEmissionLoadGrk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $ppuModel = $model->ppuEmissionSource->ppu;

        $startDate = new \DateTime();
        $startDate->setDate($ppuModel->ppu_year - 2, 7, 1);

        $ppuCalc = $model->ppuEmissionLoadGrkCalcs;

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuCalc, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'ppuCalc' => $ppuCalc,
                'startDate' => $startDate,
                'ppuModel' => $ppuModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PpuEmissionLoadGrk model.
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
     * Finds the PpuEmissionLoadGrk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuEmissionLoadGrk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuEmissionLoadGrk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
