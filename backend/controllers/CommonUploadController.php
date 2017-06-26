<?php

namespace backend\controllers;

use backend\models\AttachmentSearch;
use backend\models\PowerPlant;
use backend\models\Codeset;
use backend\models\CommonUpload;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;

/**
 * CommonUploadController implements the CRUD actions for CommonUpload model.
 */
class CommonUploadController extends AppController {
    
    /* @var $powerPlantModel \backend\models\PowerPlant */
    public $powerPlantModel;
    
    /* @var $codesetModel \backend\models\Codeset */
    public $codesetModel;
    
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
            $powerPlantId = Yii::$app->request->get('_ppId');
            $csetCode = strtoupper(Yii::$app->request->get('utc'));
            if ((($powerPlant = PowerPlant::findOne($powerPlantId)) !== null) && (($codeset = Codeset::getCodesetObject(AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE, $csetCode)) !== null)) {
                $this->powerPlantModel = $powerPlant;
                $this->codesetModel = $codeset;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        
        return $this->rbac();
    }
    
    /**
     * Lists all CommonUpload models.
     * @return mixed
     */
    public function actionIndex() {
        $model = $this->findModelInPowerPlant();
        
        $searchModel = new AttachmentSearch();
        $searchModel->atf_location = AppConstants::MODULE_CODE_COMMON_UPLOAD;
        $searchModel->owner_pk = $model != false ? $model->id : 0;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'powerPlantModel' => $this->powerPlantModel,
            'codesetModel' => $this->codesetModel
        ]);
    }
    
    /**
     * Finds the CommonUpload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CommonUpload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CommonUpload::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function findModelInPowerPlant() {
        if (($model = CommonUpload::find()->where(['sector_id' => $this->powerPlantModel->sector_id, 'power_plant_id' => $this->powerPlantModel->id])->one()) !== null) {
            return $model;
        } else {
            return false;
        }
    }
    
    /**
     * Creates a new CommonUpload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $existingModel = $this->findModelInPowerPlant();
        if ($existingModel != null) {
            return $this->redirect(['update', 'id' => $existingModel->id]);
        }
        
        $model = new CommonUpload();
        $model->sector_id = $this->powerPlantModel->sector_id;
        $model->power_plant_id = $this->powerPlantModel->id;
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['index', 'utc' => $model->upload_type_code, '_ppId' => $model->power_plant_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'powerPlantModel' => $this->powerPlantModel,
                'codesetModel' => $this->codesetModel
            ]);
        }
    }
    
    /**
     * Updates an existing CommonUpload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $this->codesetModel = Codeset::getCodesetObject(AppConstants::CODESET_COMMON_UPLOAD_TYPE_CODE, $model->upload_type_code);
        
        if ($model->load(Yii::$app->request->post()) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['index', 'utc' => $model->upload_type_code, '_ppId' => $model->power_plant_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'powerPlantModel' => $model->powerPlant,
                'codesetModel' => $this->codesetModel
            ]);
        }
    }
    
    /**
     * Deletes an existing CommonUpload model.
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
