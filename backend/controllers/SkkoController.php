<?php

namespace backend\controllers;

use backend\models\Sector;
use backend\models\SkkoDetail;
use Yii;
use backend\models\Skko;
use backend\models\SkkoSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * SkkoController implements the CRUD actions for Skko model.
 */
class SkkoController extends AppController
{
    public $sectorModel;
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

        if (in_array($action->id, ['index', 'create', 'update', 'view'])) {
            $sectorId = Yii::$app->request->get('_sId');
            if (($sector = Sector::findOne($sectorId)) !== null) {
                $this->sectorModel = $sector;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

        return $this->rbac();
    }

    /**
     * Lists all Skko models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkkoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sectorModel' => $this->sectorModel,
        ]);
    }

    /**
     * Displays a single Skko model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $detailModel = $model->skkoDetails;

        return $this->render('view', [
            'model' => $model,
            'detailModel' => $detailModel,
            'sectorModel' => $this->sectorModel,
        ]);
    }

    /**
     * Creates a new Skko model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skko();
        $detailModel = [];
        $detailModel[] = new SkkoDetail();

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModel, $requestData)&& $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id, '_sId' => $this->sectorModel->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'sectorModel' => $this->sectorModel,
                'detailModel' => $detailModel,
            ]);
        }
    }

    /**
     * Updates an existing Skko model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $detailModel = $model->skkoDetails;

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModel, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id, '_sId' => $this->sectorModel->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'sectorModel' => $this->sectorModel,
                'detailModel' => $detailModel,
            ]);
        }
    }

    /**
     * Deletes an existing Skko model.
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

        return $this->redirect(['index', '_sId' => $model->sector_id]);
    }

    /**
     * Finds the Skko model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Skko the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Skko::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
