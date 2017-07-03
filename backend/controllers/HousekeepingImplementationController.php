<?php

namespace backend\controllers;

use backend\models\HousekeepingQuestion;
use Yii;
use backend\models\HousekeepingImplementation;
use backend\models\HousekeepingImplementationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;

/**
 * HousekeepingImplementationController implements the CRUD actions for HousekeepingImplementation model.
 */
class HousekeepingImplementationController extends AppController
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
     * Lists all HousekeepingImplementation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HousekeepingImplementationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single HousekeepingImplementation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $questionList = HousekeepingQuestion::find()->all();

        $answerList = [];
        foreach(HousekeepingQuestion::find()->all() as $key => $question){
            foreach($question->hqDetails as $keyD => $detail) {
                $answerList[$detail->id] = $model->getHiDetailByQuestion($detail->id);
            }
        }

        if(Yii::$app->request->isPost){
            $answerList = array_values($answerList);
        }

        return $this->render('view', [
            'model' => $model,
            'answerList' => $answerList,
            'questionList' => $questionList,
        ]);
    }

    /**
     * Creates a new HousekeepingImplementation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HousekeepingImplementation();

        $questionList = HousekeepingQuestion::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'questionList' => $questionList,
            ]);
        }
    }

    /**
     * Updates an existing HousekeepingImplementation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $questionList = HousekeepingQuestion::find()->all();

        $answerList = [];
        foreach(HousekeepingQuestion::find()->all() as $key => $question){
            foreach($question->hqDetails as $keyD => $detail) {
                $answerList[$detail->id] = $model->getHiDetailByQuestion($detail->id);
            }
        }

        if(Yii::$app->request->isPost){
            $answerList = array_values($answerList);
        }

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'answerList' => $answerList,
                'questionList' => $questionList,
            ]);
        }
    }

    /**
     * Deletes an existing HousekeepingImplementation model.
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

    public function actionExport($id) {

        $searchModel = new HousekeepingImplementationSearch();

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the HousekeepingImplementation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HousekeepingImplementation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HousekeepingImplementation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
