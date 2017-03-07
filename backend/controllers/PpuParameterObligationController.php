<?php

namespace backend\controllers;

use backend\models\PpupoMonth;
use Yii;
use backend\models\PpuParameterObligation;
use backend\models\PpuParameterObligationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Ppu;
use yii\base\Model;

/**
 * PpuParameterObligationController implements the CRUD actions for PpuParameterObligation model.
 */
class PpuParameterObligationController extends AppController
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

    /**
     * Lists all PpuParameterObligation models.
     * @return mixed
     */

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

    public function actionIndex()
    {
        $searchModel = new PpuParameterObligationSearch();
        $dataProvider = $searchModel->searchPpu(Yii::$app->request->queryParams, $this->ppuModel->id);

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpuParameterObligation model.
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
     * Creates a new PpuParameterObligation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuParameterObligation();

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);

        $ppupoMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $ppupoMonth[] = new PpupoMonth();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppupoMonth, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'ppuModel' => $this->ppuModel,
                'model' => $model,
                'startDate' => $startDate,
                'ppupoMonth' => $ppupoMonth,
            ]);
        }
    }

    /**
     * Updates an existing PpuParameterObligation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $ppuModel = $model->ppuEmissionSource->ppu;

        $startDate = new \DateTime();
        $startDate->setDate($ppuModel->ppu_year - 1, 7, 1);

        $ppupoMonth = $model->ppupoMonths;


        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppupoMonth, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'ppuModel' => $ppuModel,
                'model' => $model,
                'startDate' => $startDate,
                'ppupoMonth' => $ppupoMonth,
            ]);
        }
    }

    /**
     * Deletes an existing PpuParameterObligation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->ppuModel = $model->ppuEmissionSource->ppu;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', 'ppuId' =>  $this->ppuModel->id]);
    }

    /**
     * Finds the PpuParameterObligation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuParameterObligation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuParameterObligation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
