<?php

namespace backend\controllers;

use backend\models\PpuapoMonth;
use Yii;
use backend\models\PpuaParameterObligation;
use backend\models\PpuaParameterObligationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PpuAmbient;
use yii\base\Model;

/**
 * PpuaParameterObligationController implements the CRUD actions for PpuaParameterObligation model.
 */
class PpuaParameterObligationController extends AppController
{
    public $ppuaModel;
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
            $ppuaId = Yii::$app->request->get('ppuaId');
            if (empty($ppuaId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->ppuaModel = PpuAmbient::findOne(['id' => $ppuaId]);
        }

        return $this->rbac();
    }

    /**
     * Lists all PpuaParameterObligation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpuaParameterObligationSearch();
        $dataProvider = $searchModel->searchPpua(Yii::$app->request->queryParams, $this->ppuaModel->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ppuaModel' => $this->ppuaModel,
        ]);
    }

    /**
     * Displays a single PpuaParameterObligation model.
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
     * Creates a new PpuaParameterObligation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuaParameterObligation();

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuaModel->ppua_year - 1, 7, 1);

        $ppuapoMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $ppuapoMonth[] = new PpuapoMonth();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuapoMonth, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'ppuaModel' => $this->ppuaModel,
                'model' => $model,
                'startDate' => $startDate,
                'ppuapoMonth' => $ppuapoMonth,
            ]);
        }
    }

    /**
     * Updates an existing PpuaParameterObligation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $ppuaModel = $model->ppuaMonitoringPoint->ppuAmbient;

        $startDate = new \DateTime();
        $startDate->setDate($ppuaModel->ppua_year - 1, 7, 1);

        $ppuapoMonth = $model->ppuapoMonths;

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuapoMonth, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'startDate' => $startDate,
                'ppuapoMonth' => $ppuapoMonth,
                'ppuaModel' => $ppuaModel,
            ]);
        }
    }

    /**
     * Deletes an existing PpuaParameterObligation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $this->ppuaModel = $model->ppuaMonitoringPoint->ppuAmbient;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', 'ppuaId' =>  $this->ppuaModel->id]);
    }

    /**
     * Finds the PpuaParameterObligation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuaParameterObligation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuaParameterObligation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
