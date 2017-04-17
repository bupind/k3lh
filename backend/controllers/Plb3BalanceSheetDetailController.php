<?php

namespace backend\controllers;

use backend\models\Plb3BalanceSheet;
use backend\models\Plb3BalanceSheetTreatment;
use backend\models\Plb3bsdMonth;
use Yii;
use backend\models\Plb3BalanceSheetDetail;
use backend\models\Plb3BalanceSheetDetailSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\vendor\AppConstants;
use backend\models\Codeset;
use yii\base\Model;

/**
 * Plb3BalanceSheetDetailController implements the CRUD actions for Plb3BalanceSheetDetail model.
 */
class Plb3BalanceSheetDetailController extends AppController
{
    /**
     * @inheritdoc
     */
    public $plb3bs_model;

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

        if (in_array($action->id, ['index', 'create', 'update', 'view'])) {
            $plb3bsId = Yii::$app->request->get('plb3bsId');
            if (empty($plb3bsId)) {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

            $this->plb3bs_model = Plb3BalanceSheet::findOne(['id' => $plb3bsId]);
        }

        return TRUE;
    }

    /**
     * Lists all Plb3BalanceSheetDetail models.
     * @return mixed
     */
    public function actionIndex($bst = null)
    {
        if (is_null($bst)) {
            $bst = AppConstants::FORM_TYPE_AD;
        }

        $bst = strtoupper($bst);
        $searchModel = new Plb3BalanceSheetDetailSearch();
        $searchModel->form_type_code = $bst;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bst);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'title' => $title,
            'bst' => $bst,
            'plb3bs_model' => $this->plb3bs_model,
        ]);
    }

    /**
     * Displays a single Plb3BalanceSheetDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($bst, $id)
    {
        $model = $this->findModel($id);
        $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bst);

        $startDate = new \DateTime();
        $startDate->setDate($this->plb3bs_model->plb3_year - 1, 7, 1);

        $plb3bsdMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $plb3bsdMonth[] = new Plb3bsdMonth();
        }

        return $this->render('view', [
            'model' => $model,
            'title' => $title,
            'startDate' => $startDate,
            'plb3bs_model' => $this->plb3bs_model,
            'plb3bsdMonth' => $plb3bsdMonth,
        ]);
    }

    /**
     * Creates a new Plb3BalanceSheetDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($bst = null)
    {
        if (is_null($bst)) {
            $bst = AppConstants::FORM_TYPE_AD;
        }

        $bst = strtoupper($bst);
        $model = new Plb3BalanceSheetDetail();
        $model->form_type_code = $bst;

        $startDate = new \DateTime();
        $startDate->setDate($this->plb3bs_model->plb3_year - 1, 7, 1);

        $plb3BalanceSheetTreatment = [];

        for($i=0; $i<7; $i++) {
            $plb3BalanceSheetTreatment[] = new Plb3BalanceSheetTreatment();
        }

        $plb3bsdMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $plb3bsdMonth[] = new Plb3bsdMonth();
        }

        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($plb3bsdMonth, $requestData) && Model::loadMultiple($plb3BalanceSheetTreatment, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_SAVE_SUCCESS);
            return $this->redirect(['view', 'bst' => $bst, 'plb3bsId' => $this->plb3bs_model->id, 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bst);

            return $this->render('create', [
                'model' => $model,
                'title' => $title,
                'startDate' => $startDate,
                'plb3bs_model' => $this->plb3bs_model,
                'bst' => $bst,
                'plb3bsdMonth' => $plb3bsdMonth,
                'plb3BalanceSheetTreatment' => $plb3BalanceSheetTreatment,
            ]);
        }
    }

    /**
     * Updates an existing Plb3BalanceSheetDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $bst = null)
    {
        if (is_null($bst)) {
            $bst = AppConstants::FORM_TYPE_AD;
        }

        $bst = strtoupper($bst);
        $model = $this->findModel($id);
        $model->form_type_code = $bst;

        $startDate = new \DateTime();
        $startDate->setDate($this->plb3bs_model->plb3_year - 1, 7, 1);

        $plb3BalanceSheetTreatment = $model->plb3BalanceSheetTreatments;

        $plb3bsdMonth = [];

        for ($i = 0; $i < 12; $i++) {
            $plb3bsdMonth[] = new Plb3bsdMonth();
        }


        $requestData = Yii::$app->request->post();

        if ($model->load($requestData) && Model::loadMultiple($plb3bsdMonth, $requestData) && Model::loadMultiple($plb3BalanceSheetTreatment, $requestData) && $model->saveTransactional()) {
            Yii::$app->session->setFlash('success', AppConstants::MSG_UPDATE_SUCCESS);
            return $this->redirect(['view', 'bst' => $bst, 'plb3bsId' => $this->plb3bs_model->id, 'id' => $model->id]);
        } else {
            $title = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $bst);

            return $this->render('update', [
                'model' => $model,
                'title' => $title,
                'startDate' => $startDate,
                'plb3bs_model' => $this->plb3bs_model,
                'bst' => $bst,
                'plb3bsdMonth' => $plb3bsdMonth,
                'plb3BalanceSheetTreatment' => $plb3BalanceSheetTreatment,
            ]);
        }
    }

    /**
     * Deletes an existing Plb3BalanceSheetDetail model.
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

        return $this->redirect(['index', 'plb3bsId' =>  $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code]);
    }

    /**
     * Finds the Plb3BalanceSheetDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plb3BalanceSheetDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plb3BalanceSheetDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
