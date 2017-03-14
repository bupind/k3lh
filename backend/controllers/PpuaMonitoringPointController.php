<?php

namespace backend\controllers;

use backend\models\PpuAmbient;
use Yii;
use backend\models\PpuaMonitoringPoint;
use backend\models\PpuaMonitoringPointSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;

/**
 * PpuaMonitoringPointController implements the CRUD actions for PpuaMonitoringPoint model.
 */
class PpuaMonitoringPointController extends AppController
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
     * Lists all PpuaMonitoringPoint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpuaMonitoringPointSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'ppuaModel' => $this->ppuaModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpuaMonitoringPoint model.
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
     * Creates a new PpuaMonitoringPoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuaMonitoringPoint();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppuaModel' => $this->ppuaModel,
            ]);
        }
    }

    /**
     * Updates an existing PpuaMonitoringPoint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->ppuaModel = $model->ppuAmbient;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppuaModel' => $this->ppuaModel,
            ]);
        }
    }

    /**
     * Deletes an existing PpuaMonitoringPoint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $this->ppuaModel = $model->ppuAmbient;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', 'ppuaId' =>  $this->ppuaModel->id]);
    }

    /**
     * Finds the PpuaMonitoringPoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuaMonitoringPoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuaMonitoringPoint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
