<?php

namespace backend\controllers;

use backend\models\PpucemsReportBm;
use backend\models\PpuEmissionSource;
use Yii;
use backend\models\PpucemsrbParameterReport;
use backend\models\PpucemsrbParameterReportSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Ppu;

/**
 * PpucemsrbParameterReportController implements the CRUD actions for PpucemsrbParameterReport model.
 */
class PpucemsrbParameterReportController extends AppController
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
     * Lists all PpucemsrbParameterReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PpucemsrbParameterReportSearch();
        $dataProvider = $searchModel->searchPpu(Yii::$app->request->queryParams, $this->ppuModel->id);

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PpucemsrbParameterReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $emissionSourceModel = PpuEmissionSource::findOne($model->ppu_emission_source_id);

        return $this->render('view', [
            'emissionSourceModel' => $emissionSourceModel,
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PpucemsrbParameterReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpucemsrbParameterReport();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $parameterList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->ppu_emission_source_id)) {
                $parameterList = PpucemsReportBm::map(new PpucemsReportBm(), 'ppucemsrb_parameter_code', null, true, [
                    'where' => [
                        ['ppu_emission_source_id' => $model->ppu_emission_source_id]
                    ]
                ]);
            }

            return $this->render('create', [
                'parameterList' => $parameterList,
                'ppuModel' => $this->ppuModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PpucemsrbParameterReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->ppuModel = $model->ppuEmissionSource->ppu;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $parameterList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->ppu_emission_source_id)) {
                $parameterList = PpucemsReportBm::map(new PpucemsReportBm(), 'ppucemsrb_parameter_code', null, true, [
                    'where' => [
                        ['ppu_emission_source_id' => $model->ppu_emission_source_id]
                    ]
                ]);
            }

            return $this->render('update', [
                'parameterList' => $parameterList,
                'ppuModel' => $this->ppuModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PpucemsrbParameterReport model.
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
     * Finds the PpucemsrbParameterReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpucemsrbParameterReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpucemsrbParameterReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
