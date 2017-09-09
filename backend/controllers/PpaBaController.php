<?php

namespace backend\controllers;

use backend\models\PowerPlant;
use backend\models\PpaBa;
use backend\models\PpaBaSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;

/**
 * PpaBaController implements the CRUD actions for PpaBa model.
 */

class PpaBaController extends AppController {
    
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
     * Lists all PpaBa models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PpaBaSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $model = new PpaBa();
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
     * Displays a single PpaBa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
    
        $startDate = new \DateTime();
        $startDate->setDate($model->ppaba_year - 1, 7, 1);
        
        return $this->render('view', [
            'model' => $model,
            'startDate' => $startDate,
        ]);
    }
    
    /**
     * Finds the PpaBa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PpaBa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PpaBa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Updates an existing PpaBa model.
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
     * Deletes an existing PpaBa model.
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
    
    public function actionExport($id) {
        $searchModel = new PpaBaSearch();
        
        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
}
