<?php

namespace backend\controllers;

use backend\models\Codeset;
use common\vendor\AppConstants;
use Yii;
use yii\helpers\Json;
use backend\models\Plb3Question;
use backend\models\Plb3QuestionSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppLabels;

/**
 * Plb3QuestionController implements the CRUD actions for Plb3Question model.
 */
class Plb3QuestionController extends AppController
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

    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }

    /**
     * Lists all Plb3Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Plb3QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plb3Question model.
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
     * Creates a new Plb3Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plb3Question();

        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $questionTypeList = ['' => AppLabels::PLEASE_SELECT];

            return $this->render('create', [
                'model' => $model,
                'questionTypeList' => $questionTypeList,
            ]);
        }
    }

    public function actionAjaxQuestionType() {
        $requestData = Yii::$app->request->post();
        $questionTypes = Codeset::find()->select(['id', 'cset_value', 'cset_code'])->where(['cset_name' => sprintf("%s_%s", "PLB3_QUESTION_TYPE_CODE", $requestData['plb3_form_type_code'])])->all();
        if (!empty($questionTypes)) {
            return Json::encode(['question_types' => $questionTypes]);
        }

        return Json::encode(false);
    }

    /**
     * Updates an existing Plb3Question model.
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
            $questionTypeList = Codeset::customMap(sprintf("%s_%s", 'PLB3_QUESTION_TYPE_CODE', $model->plb3_form_type_code));
            return $this->render('update', [
                'model' => $model,
                'questionTypeList' => $questionTypeList,
            ]);
        }
    }

    /**
     * Deletes an existing Plb3Question model.
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
     * Finds the Plb3Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plb3Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
