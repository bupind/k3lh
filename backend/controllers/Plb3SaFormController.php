<?php

namespace backend\controllers;

use backend\models\Codeset;
use backend\models\Plb3SaFormDetail;
use backend\models\Plb3SaFormDetailStatic;
use backend\models\Plb3SaFormDetailStaticQuarter;
use backend\models\Plb3SelfAssessment;
use backend\models\Plb3SaQuestion;
use backend\models\Plb3SaForm;
use backend\models\Plb3SaFormSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * Plb3SaFormController implements the CRUD actions for Plb3SaForm model.
 */
class Plb3SaFormController extends AppController {
    
    /* @var $plb3SAModel Plb3SelfAssessment */
    public $plb3SAModel;
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
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
        
        if (in_array($action->id, ['index', 'create'])) {
            $plb3SAId = Yii::$app->request->get('plb3SAId');
            if (empty($plb3SAId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            
            $this->plb3SAModel = Plb3SelfAssessment::findOne(['id' => $plb3SAId]);
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all Plb3SaForm models.
     * @return mixed
     */
    public function actionIndex() {
        $model = Plb3SaForm::findOne(['plb3_self_assessment_id' => $this->plb3SAModel->id]);
    
        if (!empty($model)) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->redirect(['create', 'plb3SAId' => $this->plb3SAModel->id]);
        }
    }
    
    /**
     * Finds the Plb3SaForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3SaForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Plb3SaForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new Plb3SaForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Plb3SaForm();
        $plb3SaFormDetailStaticModel = new Plb3SaFormDetailStatic();
        $plb3SaFormDetailStaticQuarterModels = [];
        for ($i=0; $i<4; $i++) {
            $plb3SaFormDetailStaticQuarterModels[] = new Plb3SaFormDetailStaticQuarter();
        }
    
        $startDate = new \DateTime();
        $startDate->setDate($this->plb3SAModel->plb3_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE);
    
        $plb3SaFormDetailModels = [];
        foreach (Plb3SaQuestion::find()->all() as $key => $question) {
            $plb3SaFormDetailModels[$question->id] = new Plb3SaFormDetail();
        }
    
        // resetting index
        if (Yii::$app->request->isPost) {
            $plb3SaFormDetailModels = array_values($plb3SaFormDetailModels);
        }
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($plb3SaFormDetailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'startDate' => $startDate,
                'plb3SAModel' => $this->plb3SAModel,
                'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
                'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
                'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
                'questionGroups' => $questionGroups
            ]);
        }
    }
    
    /**
     * Updates an existing Plb3SaForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
    
        $plb3SaFormDetailStaticModel = $model->plb3SaFormDetailStatic;
        $plb3SaFormDetailStaticQuarterModels = $model->plb3SaFormDetailStaticQuarters;
    
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3SelfAssessment->plb3_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE);
    
        $plb3SaFormDetailModels = [];
        foreach (Plb3SaQuestion::find()->all() as $key => $question) {
            $detailModel = $model->getPlb3SaFormDetailByQuestion($question->id);
            $plb3SaFormDetailModels[$question->id] = is_null($detailModel) ? new Plb3SaFormDetail() : $detailModel;
        }
        
        // resetting index
        if (Yii::$app->request->isPost) {
            $plb3SaFormDetailModels = array_values($plb3SaFormDetailModels);
        }
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($plb3SaFormDetailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'startDate' => $startDate,
                'plb3SAModel' => $model->plb3SelfAssessment,
                'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
                'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
                'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
                'questionGroups' => $questionGroups
            ]);
        }
    }
    
    /**
     * Deletes an existing Plb3SaForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $plb3SA = $model->plb3SelfAssessment;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
    
        return $this->redirect(['index', 'plb3SAId' => $plb3SA->id]);
    }
}
