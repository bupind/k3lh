<?php

namespace backend\controllers;

use Yii;
use backend\models\MaturityLevelK3lQuestion;
use backend\models\MaturityLevelK3lQuestionSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\MaturityLevelK3lTitle;
/**
 * MaturityLevelK3lQuestionController implements the CRUD actions for MaturityLevelK3lQuestion model.
 */
class MaturityLevelK3lQuestionController extends AppController
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
     * Lists all MaturityLevelK3lQuestion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaturityLevelK3lQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaturityLevelK3lQuestion model.
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
     * Creates a new MaturityLevelK3lQuestion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaturityLevelK3lQuestion();
        $maturityLevelK3lTitleMdl = new MaturityLevelK3lTitle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'maturityLevelK3lTitleMdl' => $maturityLevelK3lTitleMdl
            ]);
        }
    }

    /**
     * Updates an existing MaturityLevelK3lQuestion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $maturityLevelK3lTitleMdl = new MaturityLevelK3lTitle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::LOG_MSG_ACTION_UPDATE);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'maturityLevelK3lTitleMdl' => $maturityLevelK3lTitleMdl
            ]);
        }
    }

    /**
     * Deletes an existing MaturityLevelK3lQuestion model.
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
     * Finds the MaturityLevelK3lQuestion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaturityLevelK3lQuestion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaturityLevelK3lQuestion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
