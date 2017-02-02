<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItemChild;
use backend\models\AuthItemChildSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends AppController {
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
    
    /**
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AuthItemChildSearch();
        $dataProvider = $searchModel->searchRole(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single AuthItemChild model.
     * @param string $parent
     * @return mixed
     */
    public function actionView($parent) {
        $models = $this->findAllModels($parent);
        
        if (empty($models)) {
            Yii::$app->session->setFlash('info', AppConstants::MSG_EMPTY_PLEASE_ADD);
            return $this->redirect(['/auth-item']);
        }
    
        return $this->render('view', [
            'models' => $models,
        ]);
    }
    
    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child) {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findAllModels($parent) {
        if (($models = AuthItemChild::findAll(['parent' => $parent])) !== null) {
            return $models;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AuthItemChild();
                
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'parent' => $model->parent]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateRole() {
        $model = new AuthItemChild();
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['index']);
        } else {
            return $this->render('create_role', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionDelete($parent, $child) {
        $model = $this->findModel($parent, $child);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }
        
        if ($model->parent0->type == 3) {
            return $this->redirect(['index']);
        }
        
        return $this->redirect(['view', 'parent' => $parent]);
    }
}
