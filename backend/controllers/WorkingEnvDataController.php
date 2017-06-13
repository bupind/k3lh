<?php

namespace backend\controllers;

use backend\models\WevDetail;
use Yii;
use backend\models\WorkingEnvData;
use backend\models\WorkingEnvDataSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;
use yii\base\Model;
use backend\models\Codeset;
use yii\helpers\Json;


/**
 * WorkingEnvDataController implements the CRUD actions for WorkingEnvData model.
 */
class WorkingEnvDataController extends AppController
{
    public $powerPlantModel;
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

        if (in_array($action->id, ['index', 'create', 'update'])) {
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
     * Lists all WorkingEnvData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkingEnvDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single WorkingEnvData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $detailModel = $model->wevDetails;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'detailModel' => $detailModel,
        ]);
    }

    /**
     * Creates a new WorkingEnvData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkingEnvData();

        $detailModel = [];
        $detailModel[] = new WevDetail();

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModel, $requestData)&& $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'detailModel' => $detailModel,
            ]);
        }
    }

    /**
     * Updates an existing WorkingEnvData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $detailModel = $model->wevDetails;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'detailModel' => $detailModel,
            ]);
        }
    }

    /**
     * Deletes an existing WorkingEnvData model.
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

    public function actionAjaxCodeset() {
        $requestData = Yii::$app->request->post();
        $codesets = Codeset::find()->select(['id', 'cset_code', 'cset_value'])->where(['cset_name' => $requestData['cset_name']])->all();
        if (!empty($codesets)) {
            return Json::encode(['codesets' => $codesets]);
        }

        return Json::encode(false);
    }

    /**
     * Finds the WorkingEnvData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkingEnvData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkingEnvData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
