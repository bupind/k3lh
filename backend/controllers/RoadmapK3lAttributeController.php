<?php

namespace backend\controllers;

use backend\models\RoadmapK3lAttribute;
use backend\models\RoadmapK3lAttributeSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use yii\helpers\Json;

/**
 * RoadmapK3lAttributeController implements the CRUD actions for RoadmapK3lAttribute model.
 */
class RoadmapK3lAttributeController extends AppController {
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
     * Lists all RoadmapK3lAttribute models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RoadmapK3lAttributeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single RoadmapK3lAttribute model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the RoadmapK3lAttribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoadmapK3lAttribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = RoadmapK3lAttribute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAjaxSearch() {
        $requestData = Yii::$app->request->post();
        
        $searchModel = new RoadmapK3lAttributeSearch();
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
     * Creates a new RoadmapK3lAttribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new RoadmapK3lAttribute();
        
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
        $model = new RoadmapK3lAttribute();
        $model->attr_type_code = $requestData['attr_type_code'];
        $model->attr_text = $requestData['attr_text'];
        
        if ($model->save()) {
            return Json::encode(['attribute' => $model]);
        }
    
        return Json::encode(false);
    }
    
    /**
     * Updates an existing RoadmapK3lAttribute model.
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
     * Deletes an existing RoadmapK3lAttribute model.
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
