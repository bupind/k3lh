<?php

namespace backend\controllers;

use backend\models\PpuQuestion;
use backend\models\PpuTechnicalProvisionDetail;
use Yii;
use backend\models\PpuTechnicalProvision;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use yii\base\Model;
use backend\models\Ppu;

/**
 * PpuTechnicalProvisionController implements the CRUD actions for PpuTechnicalProvision model.
 */
class PpuTechnicalProvisionController extends AppController
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

    public function beforeAction($action)
    {
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
     * Lists all PpuTechnicalProvision models.
     * @return mixed
     */
    public function actionIndex()
    {
        $ppuQuestions = PpuQuestion::find()->all();
        $questionCount = PpuQuestion::find()->count();
        $detailModels = [];

        for ($i=0; $i<$questionCount; $i++) {
            $detailModels[] = new PpuTechnicalProvisionDetail();
        }


        if(is_null($ppuTp = PpuTechnicalProvision::findOne(['ppu_id' => $this->ppuModel->id]))){
            $model = new PpuTechnicalProvision();
        }else {
            $model = $this->findModel($ppuTp->id);
            $detailModels = $model->ppuTechnicalProvisionDetails;
            if(count($detailModels) != $questionCount ){
                for($i=0; $i<(abs(count($detailModels)-$questionCount)); $i++){
                    $newPpuTpD = new PpuTechnicalProvisionDetail();
                    $detailModels[] = $newPpuTpD;
                }
            }
        }

        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) &&  $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $id = $this->ppuModel->id;
            $this->redirect(['index', 'ppuId' => $id]);
        }

        return $this->render('index', [
            'ppuModel' => $this->ppuModel,
            'detailModels' => $detailModels,
            'ppuQuestions' => $ppuQuestions,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single PpuTechnicalProvision model.
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
     * Creates a new PpuTechnicalProvision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PpuTechnicalProvision();

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
     * Updates an existing PpuTechnicalProvision model.
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
     * Deletes an existing PpuTechnicalProvision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the PpuTechnicalProvision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpuTechnicalProvision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PpuTechnicalProvision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
