<?php

namespace backend\controllers;

use Yii;
use backend\models\PpuCompulsoryMonitoredEmissionSource;
use backend\models\PpuCompulsoryMonitoredEmissionSourceSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Ppu;
use backend\models\PpucmesMonth;
use yii\base\Model;

/**
 * PpuCompulsoryMonitoredEmissionSourceController implements the CRUD actions for PpuCompulsoryMonitoredEmissionSource model.
 */
class PpuCompulsoryMonitoredEmissionSourceController extends AppController
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
     * Lists all PpuCompulsoryMonitoredEmissionSource models.
     * @return mixed
     */
    public function actionIndex($ppuId)
    {
        if (empty($ppuId)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $ppuModel = Ppu::findOne(['id' => $ppuId]);

        $searchModel = new PpuCompulsoryMonitoredEmissionSourceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'ppuModel' => $ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpuCompulsoryMonitoredEmissionSource model.
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
     * Creates a new PpuCompulsoryMonitoredEmissionSource model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ppuId)
    {

        if (empty($ppuId)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new PpuCompulsoryMonitoredEmissionSource();

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);
        $ppuMonthModels = [];

        for ($i=0; $i<12; $i++) {
            $ppuMonthModels[] = new PpucmesMonth();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppuId' => $ppuId,
                'ppuModel' => $this->ppuModel,
                'startDate' => $startDate,
                'ppuMonthModels' => $ppuMonthModels,
            ]);
        }
    }

    /**
     * Updates an existing PpuCompulsoryMonitoredEmissionSource model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->ppuModel = $model->ppu;
        $ppuMonthModels = $model->ppucmesMonths;

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuMonthModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppuModel' => $this->ppuModel,
                'startDate' => $startDate,
                'ppuMonthModels' => $ppuMonthModels
            ]);
        }
    }

    /**
     * Deletes an existing PpuCompulsoryMonitoredEmissionSource model.
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
     * Finds the PpuCompulsoryMonitoredEmissionSource model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuCompulsoryMonitoredEmissionSource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuCompulsoryMonitoredEmissionSource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
