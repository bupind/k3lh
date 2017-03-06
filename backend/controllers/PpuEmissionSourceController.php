<?php

namespace backend\controllers;

use Yii;
use backend\models\PpuEmissionSource;
use backend\models\PpuEmissionSourceSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Ppu;
use yii\helpers\Json;
use backend\models\Codeset;
use backend\models\PpuesMonth;
use yii\base\Model;

/**
 * PpuEmissionSourceController implements the CRUD actions for PpuEmissionSource model.
 */
class PpuEmissionSourceController extends AppController
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

        if (in_array($action->id, ['index', 'create', 'operation-time'])) {
            $ppuId = Yii::$app->request->get('ppuId');
            if (empty($ppuId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->ppuModel = Ppu::findOne(['id' => $ppuId]);
        }

        return true;
    }

    public function actionAjaxEmission() {
        $requestData = Yii::$app->request->post();
        $parameters = PpuEmissionSource::find()->select(['id', 'ppues_chimney_name', 'ppues_chimney_height', 'ppues_chimney_diameter', 'ppues_hole_position', 'ppues_fuel_name_code', 'ppues_capacity', 'ppues_operation_time' ])->where(['id' => $requestData['ppu_emission_source_id']])->all();
        foreach($parameters as $key => $param){
            $param->ppues_fuel_name_code = Codeset::getCodesetValue(AppConstants::CODESET_PPU_ES_FUEL_NAME_CODE, $param->ppues_fuel_name_code);
        }
        if (!empty($parameters)) {
            return Json::encode(['parameters' => $parameters]);
        }

        return Json::encode(false);
    }

    /**
     * Lists all PpuEmissionSource models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PpuEmissionSourceSearch();
        $dataProvider = $searchModel->searchPpu(Yii::$app->request->queryParams, $this->ppuModel->id);

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpuEmissionSource model.
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
     * Creates a new PpuEmissionSource model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);
        $ppuMonthModels = [];

        for ($i=0; $i<12; $i++) {
            $ppuMonthModels[] = new PpuesMonth();
        }

        $model = new PpuEmissionSource();

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppuMonthModels, $requestData)&& $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ppuModel' => $this->ppuModel,
                'startDate' => $startDate,
                'ppuMonthModels' => $ppuMonthModels,
            ]);
        }
    }


    /**
     * Updates an existing PpuEmissionSource model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ppuMonthModels = $model->ppuesMonths;
        $this->ppuModel = $model->ppu;

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ppuModel' => $this->ppuModel,
                'startDate' => $startDate,
                'ppuMonthModels' => $ppuMonthModels,
            ]);
        }
    }

    /**
     * Deletes an existing PpuEmissionSource model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->ppuModel = $model->ppu;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', 'ppuId' =>  $this->ppuModel->id]);
    }

    /**
     * Finds the PpuEmissionSource model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuEmissionSource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuEmissionSource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
