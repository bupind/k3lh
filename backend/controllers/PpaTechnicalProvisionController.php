<?php

namespace backend\controllers;

use backend\models\Codeset;
use backend\models\Ppa;
use backend\models\PpaQuestion;
use backend\models\PpaTechnicalProvision;
use backend\models\PpaTechnicalProvisionDetail;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\base\Model;

/**
 * PpaTechnicalProvisionController implements the CRUD actions for PpaTechnicalProvision model.
 */
class PpaTechnicalProvisionController extends AppController {
    
    public $ppaModel;
    
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
            $ppaId = Yii::$app->request->get('ppaId');
            if (empty($ppaId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
            
            $this->ppaModel = Ppa::findOne(['id' => $ppaId]);
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all PpaTechnicalProvision models.
     * @return mixed
     */
    public function actionIndex() {
        $model = PpaTechnicalProvision::findOne(['ppa_id' => $this->ppaModel->id]);
                
        if (!empty($model)) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->redirect(['create', 'ppaId' => $this->ppaModel->id]);
        }
    }
    
    /**
     * Displays a single PpaTechnicalProvision model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the PpaTechnicalProvision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaTechnicalProvision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaTechnicalProvision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new PpaTechnicalProvision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PpaTechnicalProvision();
    
        $startDate = new \DateTime();
        $startDate->setDate($this->ppaModel->ppa_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE);
        $questionCount = PpaQuestion::find()->count();
    
        $ppaTechProvDetailModels = [];
        for ($i=0; $i<$questionCount; $i++) {
            $ppaTechProvDetailModels[] = new PpaTechnicalProvisionDetail();
        }
        
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaTechProvDetailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'startDate' => $startDate,
                'ppaModel' => $this->ppaModel,
                'ppaTechProvDetailModels' => $ppaTechProvDetailModels,
                'questionGroups' => $questionGroups
            ]);
        }
    }
    
    /**
     * Updates an existing PpaTechnicalProvision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppa->ppa_year - 1, 7, 1);
    
        $questionGroups = Codeset::getCodesetAll(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE);
        $ppaTechProvDetailModels = $model->ppaTechnicalProvisionDetails;
        
        $ppaLaboratoriumModels = $model->ppaLaboratoriums;
    
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && Model::loadMultiple($ppaTechProvDetailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'startDate' => $startDate,
                'ppaModel' => $model->ppa,
                'ppaTechProvDetailModels' => $ppaTechProvDetailModels,
                'ppaLaboratoriumModels' => $ppaLaboratoriumModels,
                'questionGroups' => $questionGroups
            ]);
        }
    }
    
    /**
     * Deletes an existing PpaTechnicalProvision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        return $this->redirect(['index']);
    }
}
