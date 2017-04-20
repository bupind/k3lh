<?php

namespace backend\controllers;

use backend\models\Plb3SaCompanyProfile;
use backend\models\Plb3SaCompanyProfileSearch;
use backend\models\Plb3SelfAssessment;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;

/**
 * Plb3SaCompanyProfileController implements the CRUD actions for Plb3SaCompanyProfile model.
 */
class Plb3SaCompanyProfileController extends AppController {
    
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
     * Lists all Plb3SaCompanyProfile models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new Plb3SaCompanyProfileSearch();
        $searchModel->plb3_self_assessment_id = $this->plb3SAModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'plb3SAModel' => $this->plb3SAModel
        ]);
    }
    
    /**
     * Displays a single Plb3SaCompanyProfile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Finds the Plb3SaCompanyProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3SaCompanyProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Plb3SaCompanyProfile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Creates a new Plb3SaCompanyProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Plb3SaCompanyProfile();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'plb3SAModel' => $this->plb3SAModel
            ]);
        }
    }
    
    /**
     * Updates an existing Plb3SaCompanyProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->plb3SAModel = $model->plb3SelfAssessment;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'plb3SAModel' => $this->plb3SAModel
            ]);
        }
    }
    
    /**
     * Deletes an existing Plb3SaCompanyProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
}
