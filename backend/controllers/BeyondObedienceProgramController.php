<?php

namespace backend\controllers;

use backend\models\BopDetail;
use Yii;
use backend\models\BeyondObedienceProgram;
use backend\models\BeyondObedienceProgramSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\PowerPlant;
use backend\models\Codeset;
use yii\helpers\Json;
use yii\base\Model;
/**
 * BeyondObedienceProgramController implements the CRUD actions for BeyondObedienceProgram model.
 */
class BeyondObedienceProgramController extends AppController
{
    public $powerPlantModel;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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

        if (in_array($action->id, ['index', 'create', 'update'])) {
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
     * Lists all BeyondObedienceProgram models.
     * @return mixed
     */
    public function actionIndex($bopt)
    {
        if (is_null($bopt)) {
            $bopt = AppConstants::FORM_TYPE_KA;
        }

        $searchModel = new BeyondObedienceProgramSearch();
        $searchModel->sector_id = $this->powerPlantModel->sector_id;
        $searchModel->power_plant_id = $this->powerPlantModel->id;
        $searchModel->bop_form_type_code = $bopt;

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bopt);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bopt' => $bopt,
            'title' => $title,
            'powerPlantModel' => $this->powerPlantModel,
        ]);
    }

    /**
     * Displays a single BeyondObedienceProgram model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $bopt)
    {

        $model = $this->findModel($id);

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bopt);

        return $this->render('view', [
            'model' => $model,
            'title' => $title,
        ]);
    }

    /**
     * Creates a new BeyondObedienceProgram model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($bopt)
    {
        if (is_null($bopt)) {
            $bopt = AppConstants::FORM_TYPE_KA;
        }
        $model = new BeyondObedienceProgram();

        $detailModels = [];

        $detailModels[] = new BopDetail();
        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($detailModels, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'bopt' => $model->bop_form_type_code, 'id' => $model->id]);
        } else {

            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bopt);

            return $this->render('create', [
                'model' => $model,
                'bopt' => $bopt,
                'title' => $title,
                'detailModels' => $detailModels,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Updates an existing BeyondObedienceProgram model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $bopt)
    {
        $model = $this->findModel($id);

        $detailModels = $model->bopDetails;

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'bopt' => $model->bop_form_type_code, 'id' => $model->id]);
        } else {

            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $bopt);

            return $this->render('update', [
                'model' => $model,
                'bopt' => $bopt,
                'title' => $title,
                'detailModels' => $detailModels,
                'powerPlantModel' => $this->powerPlantModel,
            ]);
        }
    }

    /**
     * Deletes an existing BeyondObedienceProgram model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_DELETE_SUCCESS);
        }

        return $this->redirect(['index', '_ppId' => $model->power_plant_id, 'bopt' => $model->bop_form_type_code] );
    }

    public function actionAjaxCodeset() {
        $requestData = Yii::$app->request->post();
        $codesets = Codeset::find()->select(['id', 'cset_code', 'cset_value'])->where(['cset_name' => $requestData['cset_name']])->all();
        if (!empty($codesets)) {
            return Json::encode(['codesets' => $codesets]);
        }

        return Json::encode(false);
    }

    public function actionExport($id) {

        $searchModel = new BeyondObedienceProgramSearch();

        if ($searchModel->export($id)) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_GENERATE_FILE_SUCCESS);
            return $this->redirect(['/download/excel', 'filename' => $searchModel->filename]);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    /**
     * Finds the BeyondObedienceProgram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BeyondObedienceProgram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BeyondObedienceProgram::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
