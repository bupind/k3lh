<?php

namespace backend\controllers;

use backend\models\Attachment;
use backend\models\Codeset;
use backend\models\WorkingPlan;
use backend\models\WorkingPlanSearch;
use Yii;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * WorkingPlanController implements the CRUD actions for WorkingPlan model.
 */
class WorkingPlanController extends AppController {
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
        return $this->rbac();
    }
    
    /**
     * Lists all WorkingPlan models.
     * @return mixed
     */
    public function actionIndex($wpt = null) {
    
        if (is_null($wpt)) {
            $wpt = AppConstants::FORM_TYPE_K3;
        }
    
        $wpt = strtoupper($wpt);
        
        $searchModel = new WorkingPlanSearch();
        $searchModel->form_type_code = $wpt;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $wpt);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => $title,
            'wpt' => $wpt
        ]);
    }
    
    /**
     * Displays a single WorkingPlan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $legends = Codeset::getCodesetAll(AppConstants::CODESET_WORKING_PLAN_LEGEND);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'legends' => $legends
        ]);
    }
    
    /**
     * Finds the WorkingPlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkingPlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkingPlan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAjaxReadDetail() {
        $requestData = Yii::$app->request->post();
        $sessionKey = AppConstants::SES_WORKING_PLAN_DETAIL;
        $wpDetailSession = Yii::$app->session->has($sessionKey) ? Yii::$app->session->get($sessionKey) : [];
        $data = [];
        if (!isset($wpDetailSession[$requestData['id']])) {
            foreach (AppConstants::$monthsList as $key => $value) {
                for ($i=1; $i<=4; $i++) {
                    $data['progress'][$key][$i] = '';
                }
            }
        } else {
            $data['progress'] = $wpDetailSession[$requestData['id']];
        }
        
        return Json::encode($data);
    }
    
    public function actionAjaxSaveDetail() {
        $requestData = Yii::$app->request->post();
        $sessionKey = AppConstants::SES_WORKING_PLAN_DETAIL;
        $wpDetailSession = Yii::$app->session->has($sessionKey) ? Yii::$app->session->get($sessionKey) : [];
        $wpDetailSession[$requestData['calendar_attribute_id']] = $requestData['progress'];
        
        Yii::$app->session->set($sessionKey, $wpDetailSession);
        return true;
    }
    
    public function actionAjaxDeleteDetail() {
        $requestData = Yii::$app->request->post();
        $sessionKey = AppConstants::SES_WORKING_PLAN_DETAIL;
        $wpDetailSession = Yii::$app->session->get($sessionKey);
        
        if (isset($wpDetailSession[$requestData['id']])) {
            unset($wpDetailSession[$requestData['id']]);
            Yii::$app->session->set($sessionKey, $wpDetailSession);
        }
        
        return Json::encode(true);
    }
    
    /**
     * Creates a new WorkingPlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($wpt = null) {
        if (is_null($wpt)) {
            $wpt = AppConstants::FORM_TYPE_K3;
        }
    
        $rmt = strtoupper($wpt);
        $model = new WorkingPlan();
        $model->form_type_code = $wpt;
        
        $requestData = Yii::$app->request->post();
        if ($model->load($requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $rmt);
            $legends = Codeset::getCodesetAll(AppConstants::CODESET_WORKING_PLAN_LEGEND);
            Yii::$app->session->remove(AppConstants::SES_WORKING_PLAN_DETAIL);
                        
            return $this->render('create', [
                'model' => $model,
                'title' => $title,
                'legends' => $legends
            ]);
        }
    }
    
    /**
     * Updates an existing WorkingPlan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $legends = Codeset::getCodesetAll(AppConstants::CODESET_WORKING_PLAN_LEGEND);
            return $this->render('update', [
                'model' => $model,
                'legends' => $legends
            ]);
        }
    }
    
    public function actionExport($id) {
        $searchModel = new WorkingPlanSearch();
        
        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    /**
     * Deletes an existing WorkingPlan model.
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
