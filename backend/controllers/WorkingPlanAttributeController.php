<?php

namespace backend\controllers;

use backend\models\WorkingPlanAttribute;
use backend\models\WorkingPlanAttributeSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\helpers\Json;

/**
 * WorkingPlanAttributeController implements the CRUD actions for WorkingPlanAttribute model.
 */
class WorkingPlanAttributeController extends AppController {
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
     * Lists all WorkingPlanAttribute models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new WorkingPlanAttributeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single WorkingPlanAttribute model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the WorkingPlanAttribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkingPlanAttribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = WorkingPlanAttribute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAjaxSearch() {
        $requestData = Yii::$app->request->post();
        
        $searchModel = new WorkingPlanAttributeSearch();
        $searchModel->attr_text = $requestData['term'];
        $searchModel->attr_type_code = $requestData['type'];
        $dataset = $searchModel->ajaxSearch();
        
        if (!empty($dataset)) {
            $result = [];
            foreach ($dataset as $data) {
                $result[] = ['label' => $data->attr_text, 'id' => $data->id];
            }
            
            return Json::encode($result);
        } else {
            return Json::encode(false);
        }
    }
    
    /**
     * Creates a new WorkingPlanAttribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new WorkingPlanAttribute();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionAjaxCreate() {
        $requestData = Yii::$app->request->post();
        $model = new WorkingPlanAttribute();
        $model->attr_type_code = $requestData['attr_type_code'];
        $model->attr_text = $requestData['attr_text'];
        
        if ($model->save()) {
            return Json::encode(['attribute' => $model]);
        }
        
        return Json::encode(false);
    }
    
    /**
     * Updates an existing WorkingPlanAttribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing WorkingPlanAttribute model.
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
