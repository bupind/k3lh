<?php

namespace backend\controllers;

use backend\models\Plb3Checklist;
use backend\models\Plb3ChecklistAnswer;
use backend\models\Plb3Question;
use Yii;
use backend\models\Plb3ChecklistDetail;
use backend\models\Plb3ChecklistDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Codeset;

/**
 * Plb3ChecklistDetailController implements the CRUD actions for Plb3ChecklistDetail model.
 */
class Plb3ChecklistDetailController extends AppController
{
    public $plb3c_model;
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
            $plb3cId = Yii::$app->request->get('plb3cId');
            if (empty($plb3cId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->plb3c_model = Plb3Checklist::findOne(['id' => $plb3cId]);
        }

        return $this->rbac();
    }

    /**
     * Lists all Plb3ChecklistDetail models.
     * @return mixed
     */
    public function actionIndex($pct = null)
    {
        if (is_null($pct)) {
            $pct = AppConstants::FORM_TYPE_TPS;
        }

        $pct = strtoupper($pct);
        $searchModel = new Plb3ChecklistDetailSearch();
        $searchModel->plb3cd_form_type_code = $pct;
        $searchModel->plb3_checklist_id = $this->plb3c_model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $pct);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => $title,
            'pct' => $pct,
            'plb3c_model' => $this->plb3c_model,
        ]);
    }

    /**
     * Displays a single Plb3ChecklistDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($pct, $id)
    {
        $model = $this->findModel($id);

        $questionGroups = Codeset::getCodesetAll(sprintf("%s_%s", "PLB3_QUESTION_TYPE_CODE", $pct));
        $answerModels = $model->plb3ChecklistAnswers;
        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $pct);

        return $this->render('view', [
            'model' => $model,
            'title' => $title,
            'plb3c_model' => $this->plb3c_model,
            'pct' => $pct,
            'questionGroups' => $questionGroups,
            'answerModels' => $answerModels,
        ]);
    }

    /**
     * Creates a new Plb3ChecklistDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pct = null)
    {
        if (is_null($pct)) {
            $pct = AppConstants::FORM_TYPE_TPS;
        }

        $pct = strtoupper($pct);

        $questionGroups = Codeset::getCodesetAll(sprintf("%s_%s", "PLB3_QUESTION_TYPE_CODE", $pct));
        $questionCount = Plb3Question::find()->where(['plb3_form_type_code' => $pct])->count();
        $answerModels = [];


        for ($i=0; $i<$questionCount; $i++) {
            $answerModels[] = new Plb3ChecklistAnswer();
        }

        $model = new Plb3ChecklistDetail();
        $model->plb3cd_form_type_code = $pct;

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'pct' => $pct, 'plb3cId' => $this->plb3c_model->id, 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $pct);

            return $this->render('create', [
                'model' => $model,
                'title' => $title,
                'plb3c_model' => $this->plb3c_model,
                'pct' => $pct,
                'questionGroups' => $questionGroups,
                'answerModels' => $answerModels,
            ]);
        }
    }

    /**
     * Updates an existing Plb3ChecklistDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $pct = null)
    {
        if (is_null($pct)) {
            $pct = AppConstants::FORM_TYPE_TPS;
        }

        $pct = strtoupper($pct);

        $model = $this->findModel($id);
        $model->plb3cd_form_type_code = $pct;

        $questionGroups = Codeset::getCodesetAll(sprintf("%s_%s", "PLB3_QUESTION_TYPE_CODE", $pct));

        $answerModels = [];
        foreach(Plb3Question::find()->all() as $key => $question){
            $answerModels[$question->id] = $model->getPlb3ChecklistAnswerByQuestion($question->id);
        }

        if(Yii::$app->request->isPost){
            $answerModels = array_values($answerModels);
        }

        $question = new Plb3Question();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'pct' => $pct, 'plb3cId' => $this->plb3c_model->id, 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $pct);

            return $this->render('update', [
                'model' => $model,
                'title' => $title,
                'plb3c_model' => $this->plb3c_model,
                'pct' => $pct,
                'questionGroups' => $questionGroups,
                'answerModels' => $answerModels,
                'question' => $question,
            ]);
        }
    }

    /**
     * Deletes an existing Plb3ChecklistDetail model.
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

        return $this->redirect(['index', 'plb3cId' =>  $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code]);
    }

    /**
     * Finds the Plb3ChecklistDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3ChecklistDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plb3ChecklistDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
