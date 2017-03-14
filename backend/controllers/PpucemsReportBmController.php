<?php

namespace backend\controllers;

use backend\models\PpucemsrbQuarter;
use Yii;
use backend\models\PpucemsReportBm;
use backend\models\PpucemsReportBmSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Ppu;
use yii\base\Model;
use yii\helpers\Json;
use backend\models\Codeset;

/**
 * PpucemsReportBmController implements the CRUD actions for PpucemsReportBm model.
 */
class PpucemsReportBmController extends AppController
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

        return $this->rbac();
    }

    /**
     * Lists all PpucemsReportBm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpucemsReportBmSearch();
        $dataProvider = $searchModel->searchPpuEmissionSource(Yii::$app->request->queryParams, $this->ppuModel->id);

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpucemsReportBm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        return $this->render('view', [
            'cemsConstant' => $cemsConstant,
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAjaxParameter() {
        $requestData = Yii::$app->request->post();
        $parameters = PpucemsReportBm::find()->select(['id', 'ppucemsrb_parameter_code'])->where(['ppu_emission_source_id' => $requestData['ppu_emission_source_id']])->all();
        foreach($parameters as $key => $param){
            $param->ppucemsrb_parameter_code = Codeset::getCodesetValue(AppConstants::CODESET_PPUCEMS_RBM_PARAM_CODE, $param->ppucemsrb_parameter_code);
        }
        if (!empty($parameters)) {
            return Json::encode(['parameters' => $parameters]);
        }

        return Json::encode(false);
    }

    /**
     * Creates a new PpucemsReportBm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpucemsReportBm();

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);

        $ppucemsrbQuarter = [];

        for ($i = 0; $i < 4; $i++) {
            $ppucemsrbQuarter[] = new PpucemsrbQuarter();
        }

        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($ppucemsrbQuarter, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'cemsConstant' => $cemsConstant,
                'startDate' => $startDate,
                'ppuModel' => $this->ppuModel,
                'ppucemsrbQuarter' => $ppucemsrbQuarter,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PpucemsReportBm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->ppuModel = $model->ppuEmissionSource->ppu;

        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        $ppucemsrbQuarter = $model->ppucemsrbQuarters;

        $startDate = new \DateTime();
        $startDate->setDate($this->ppuModel->ppu_year - 1, 7, 1);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'cemsConstant' => $cemsConstant,
                'startDate' => $startDate,
                'ppuModel' => $this->ppuModel,
                'ppucemsrbQuarter' => $ppucemsrbQuarter,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PpucemsReportBm model.
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

        return $this->redirect(['index', 'ppuId' => $this->ppuModel->id]);
    }

    /**
     * Finds the PpucemsReportBm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpucemsReportBm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpucemsReportBm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
