<?php

namespace backend\controllers;

use backend\models\EnvironmentPermit;
use Yii;
use backend\models\EnvironmentPermitDetail;
use backend\models\EnvironmentPermitDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\vendor\AppConstants;

/**
 * EnvironmentPermitDetailController implements the CRUD actions for EnvironmentPermitDetail model.
 */
class EnvironmentPermitDetailController extends AppController
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
     * Lists all EnvironmentPermitDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnvironmentPermitDetailSearch();
        $searchModel->environment_permit_id = $this->epModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'epModel' => $this->epModel,
        ]);
    }

    /**
     * Displays a single EnvironmentPermitDetail model.
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
     * Creates a new EnvironmentPermitDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnvironmentPermitDetail();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()){
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'epModel' => $this->epModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EnvironmentPermitDetail model.
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
            return $this->render('update', [
                'epModel' => $this->epModel,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EnvironmentPermitDetail model.
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

    public function actionAjaxDelete() {
        $requestData = Yii::$app->request->post();
        $id = $requestData['id'];
        if ($this->findModel($id)->delete()) {
            return Json::encode(true);
        }

        return Json::encode(false);
    }

    /**
     * Finds the EnvironmentPermitDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnvironmentPermitDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnvironmentPermitDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
