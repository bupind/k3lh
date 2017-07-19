<?php

namespace backend\controllers;

use backend\models\EnvironmentPermitDistrict;
use backend\models\EnvironmentPermitMinistry;
use backend\models\EnvironmentPermitProvince;
use Yii;
use backend\models\EnvironmentPermitReport;
use backend\models\EnvironmentPermitReportSearch;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\EnvironmentPermit;

/**
 * EnvironmentPermitReportController implements the CRUD actions for EnvironmentPermitReport model.
 */
class EnvironmentPermitReportController extends AppController
{
    /**
     * @inheritdoc
     */
    public $epModel;
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
            $epId = Yii::$app->request->get('epId');
            if (empty($epId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->epModel = EnvironmentPermit::findOne(['id' => $epId]);
        }

        return $this->rbac();
    }

    /**
     * Lists all EnvironmentPermitReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnvironmentPermitReportSearch();
        $searchModel->environment_permit_id  = $this->epModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'epModel' => $this->epModel,
        ]);
    }

    /**
     * Displays a single EnvironmentPermitReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $districtModel = $model->environmentPermitDistricts;
        $provinceModel = $model->environmentPermitProvinces;
        $ministryModel = $model->environmentPermitMinistrys;

        return $this->render('view', [
            'model' => $model,
            'districtModel' => $districtModel,
            'provinceModel' => $provinceModel,
            'ministryModel' => $ministryModel,
        ]);
    }

    /**
     * Creates a new EnvironmentPermitReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnvironmentPermitReport();
        $districtModel = [];
        $districtModel[] = new EnvironmentPermitDistrict();
        $provinceModel = [];
        $provinceModel[] = new EnvironmentPermitProvince();
        $ministryModel = [];
        $ministryModel[] = new EnvironmentPermitMinistry();

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($districtModel, $requestData) && Model::loadMultiple($provinceModel, $requestData) && Model::loadMultiple($ministryModel, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'epModel' => $this->epModel,
                'districtModel' => $districtModel,
                'provinceModel' => $provinceModel,
                'ministryModel' => $ministryModel,
            ]);
        }
    }

    /**
     * Updates an existing EnvironmentPermitReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $districtModel = $model->environmentPermitDistricts;
        $provinceModel = $model->environmentPermitProvinces;
        $ministryModel = $model->environmentPermitMinistrys;

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($districtModel, $requestData) && Model::loadMultiple($provinceModel, $requestData) && Model::loadMultiple($ministryModel, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'epModel' => $this->epModel,
                'districtModel' => $districtModel,
                'provinceModel' => $provinceModel,
                'ministryModel' => $ministryModel,
            ]);
        }
    }

    /**
     * Deletes an existing EnvironmentPermitReport model.
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

        return $this->redirect(['index', 'epId' => $model->environment_permit_id]);
    }

    /**
     * Finds the EnvironmentPermitReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnvironmentPermitReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnvironmentPermitReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
