<?php

namespace backend\controllers;

use backend\models\BudgetMonitoringDetail;
use backend\models\BudgetMonitoringMonth;
use Yii;
use backend\models\BudgetMonitoring;
use backend\models\BudgetMonitoringSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use backend\models\PowerPlant;

/**
 * BudgetMonitoringController implements the CRUD actions for BudgetMonitoring model.
 */
class BudgetMonitoringController extends AppController
{
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
     * Lists all BudgetMonitoring models.
     * @return mixed
     */

    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }

    public function actionIndex($bmt = null)
    {
        if (is_null($bmt)) {
            $bmt = AppConstants::FORM_TYPE_LH;
        }

        $bmt = strtoupper($bmt);
        $searchModel = new BudgetMonitoringSearch();
        $searchModel->form_type_code = $bmt;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bmt);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => $title,
            'bmt' => $bmt,
        ]);
    }

    /**
     * Displays a single BudgetMonitoring model.
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
     * Creates a new BudgetMonitoring model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($bmt = null)
    {
        if (is_null($bmt)) {
            $bmt = AppConstants::FORM_TYPE_LH;
        }

        $bmt = strtoupper($bmt);
        $model=new BudgetMonitoring();
        $model->form_type_code = $bmt;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bmt);

            $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->power_plant_id)) {
                $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                    'where' => [
                        ['sector_id' => $model->sector_id]
                    ]
                ]);
            }
            return $this->render('create', [
                'model' => $model,
                'title' => $title,
                'powerPlantList' => $powerPlantList,
            ]);
        }
    }

    /**
     * Updates an existing BudgetMonitoring model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);

            return $this->render('update', [
                'model' => $model,
                'powerPlantList' => $powerPlantList
            ]);
        }
    }

    /**
     * Deletes an existing BudgetMonitoring model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionRealization($id){


        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $powerPlantList = ['' => AppLabels::PLEASE_SELECT];
            if (!is_null($model->power_plant_id)) {
                $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                    'where' => [
                        ['sector_id' => $model->sector_id]
                    ]
                ]);
            }
            return $this->render('realization', [
                'model' => $model,
                'powerPlantList' => $powerPlantList,
            ]);
        }
    }
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the BudgetMonitoring model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BudgetMonitoring the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BudgetMonitoring::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
