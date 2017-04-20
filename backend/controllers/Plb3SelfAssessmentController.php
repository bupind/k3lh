<?php

namespace backend\controllers;

use backend\models\PowerPlant;
use backend\models\Plb3SelfAssessment;
use backend\models\Plb3SelfAssessmentSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use backend\models\Codeset;
use backend\models\Plb3SaQuestion;

/**
 * Plb3SelfAssessmentController implements the CRUD actions for Plb3SelfAssessment model.
 */
class Plb3SelfAssessmentController extends AppController {
    
    /* @var $powerPlantModel \backend\models\PowerPlant */
    public $powerPlantModel;
    
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
     * Lists all Plb3SelfAssessment models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new Plb3SelfAssessmentSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $model = new Plb3SelfAssessment();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            $this->redirect(['index', '_ppId' => $model->power_plant_id]);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'powerPlantModel' => $this->powerPlantModel
        ]);
    }
    
    /**
     * Displays a single Plb3SelfAssessment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->plb3_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE);
    
        $plb3Form = $model->plb3SaForms[0];
    
        $plb3SaFormDetailStaticModel = $plb3Form->plb3SaFormDetailStatic;
        $plb3SaFormDetailStaticQuarterModels = $plb3Form->plb3SaFormDetailStaticQuarters;
        
        $plb3SaFormDetailModels = [];
        foreach (Plb3SaQuestion::find()->all() as $key => $question) {
            $detailModel = $plb3Form->getPlb3SaFormDetailByQuestion($question->id);
            if (!is_null($detailModel)) {
                $plb3SaFormDetailModels[$question->id] = $detailModel;
            }
        }
        
        return $this->render('view', [
            'model' => $model,
            'startDate' => $startDate,
            'questionGroups' => $questionGroups,
            'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
            'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
            'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
        ]);
    }
    
    /**
     * Finds the Plb3SelfAssessment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3SelfAssessment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Plb3SelfAssessment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Updates an existing Plb3SelfAssessment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing Plb3SelfAssessment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
    
        return $this->redirect(['index', '_ppId' => $model->power_plant_id]);
    }
}
