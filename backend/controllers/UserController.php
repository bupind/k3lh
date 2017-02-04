<?php

namespace backend\controllers;

use Yii;
use backend\models\UserSearch;
use backend\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\User;
use backend\models\Employee;
use yii\base\Model;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AppController {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        return $this->rbac();
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionReport() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('report', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        $model->scenario = User::SCENARIO_REGISTER;
        
        /*
         * this is only a temporary value to skip a validation, 
         * the real value will be assigned after employee created in signup function.
         */
        $model->employee_id = 1;
        
        $employeeMdl = new Employee();        
        $employeeMdl->joined_date = date('Y-m-d');
        $requestData = Yii::$app->request->post();
        
        if ($model->load($requestData) && $employeeMdl->load($requestData) && Model::validateMultiple([$model, $employeeMdl]) && $model->signup()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['index']);
        } else {            
            return $this->render('create', ['model' => $model, 'employeeMdl' => $employeeMdl]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $employeeMdl = $model->employee;

        $requestData = Yii::$app->request->post();
        
        if ($model->load($requestData) && $employeeMdl->load($requestData) && Model::validateMultiple([$model, $employeeMdl]) && $model->signupUpdate()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);                
        }
        
        return $this->render('update', ['model' => $model, 'employeeMdl' => $employeeMdl]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);

        $model->softDelete();
        Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
            
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}