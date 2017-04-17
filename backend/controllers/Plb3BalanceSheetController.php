<?php

namespace backend\controllers;

use Yii;
use backend\models\Plb3BalanceSheet;
use backend\models\Plb3BalanceSheetSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PowerPlant;
use common\vendor\AppConstants;
use backend\models\Plb3bsdMonth;

/**
 * Plb3BalanceSheetController implements the CRUD actions for Plb3BalanceSheet model.
 */
class Plb3BalanceSheetController extends AppController
{
    /**
     * @inheritdoc
     */
    public $powerPlantModel;

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

        if (in_array($action->id, ['index'])) {
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
     * Lists all Plb3BalanceSheet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Plb3BalanceSheetSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Plb3BalanceSheet();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $this->redirect(['index', '_ppId' => $model->power_plant_id]);
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single Plb3BalanceSheet model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $plb3bsdMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $plb3bsdMonth[] = new Plb3bsdMonth();
        }

        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'startDate' => $startDate,
            'plb3bsdMonth' => $plb3bsdMonth,
        ]);
    }

    /**
     * Creates a new Plb3BalanceSheet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plb3BalanceSheet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Plb3BalanceSheet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Plb3BalanceSheet model.
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

    /**
     * Finds the Plb3BalanceSheet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3BalanceSheet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plb3BalanceSheet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
