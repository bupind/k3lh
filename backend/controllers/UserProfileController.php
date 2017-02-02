<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\User;
use yii\base\Model;

/**
 * UserProfileController implements the CRUD actions for User model.
 */
class UserProfileController extends AppController {

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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $employeeMdl = $model->employee;

        $requestData = Yii::$app->request->post();
        
        if ($model->load($requestData) && $employeeMdl->load($requestData) && Model::validateMultiple([$model, $employeeMdl]) && $model->updateProfile()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);                
        }
        
        return $this->render('update', ['model' => $model, 'employeeMdl' => $employeeMdl]);
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
