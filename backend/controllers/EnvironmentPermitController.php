<?php

namespace backend\controllers;

use backend\models\EnvironmentPermitDetail;
use Yii;
use backend\models\EnvironmentPermit;
use backend\models\EnvironmentPermitSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\PowerPlant;

/**
 * EnvironmentPermitController implements the CRUD actions for EnvironmentPermit model.
 */
class EnvironmentPermitController extends AppController
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
     * Lists all EnvironmentPermit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnvironmentPermitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnvironmentPermit model.
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
     * Creates a new EnvironmentPermit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnvironmentPermit();
        $firstDetail = new EnvironmentPermitDetail();

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

            return $this->render('create', [
                'firstDetail' => $firstDetail,
                'powerPlantList' => $powerPlantList,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EnvironmentPermit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $powerPlantList = PowerPlant::map(new PowerPlant(), 'pp_name', null, true, [
                'where' => [
                    ['sector_id' => $model->sector_id]
                ]
            ]);

            return $this->render('update', [
                'powerPlantList' => $powerPlantList,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EnvironmentPermit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EnvironmentPermit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnvironmentPermit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnvironmentPermit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
