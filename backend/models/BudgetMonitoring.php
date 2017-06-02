<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "budget_monitoring".
 *
 * @property integer $id
 * @property string $form_type_code
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $k3l_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property BudgetMonitoringDetail[] $budgetMonitoringDetails
 */
class BudgetMonitoring extends AppModel{
    public $form_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return 'budget_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['form_type_code', 'sector_id', 'power_plant_id', 'k3l_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['form_type_code'], 'string', 'max' => 10],
            [['k3l_year'], 'string', 'max' => 4],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_type_code' => AppLabels::FORM_TYPE,
            'form_type_code_desc' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'k3l_year' => AppLabels::YEAR,
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }


    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $budgetMonitoringLHId = $this->id;

            if (isset($request['BudgetMonitoringDetail'])) {
                foreach ($request['BudgetMonitoringDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailTuple = BudgetMonitoringDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailTuple = new BudgetMonitoringDetail();
                        $detailTuple->budget_monitoring_id = $budgetMonitoringLHId;
                    }

                    if (!$detailTuple->load(['BudgetMonitoringDetail' => $detail]) || !$detailTuple->save()) {
                        $errors = array_merge($errors, $detailTuple->errors);
                        throw new Exception();
                    }

                    if (isset($request['BudgetMonitoringMonth'][$key])) {
                        foreach ($request['BudgetMonitoringMonth'][$key] as $key2 => $month) {
                            if (isset($month['id'])) {
                                $monthTuple = BudgetMonitoringMonth::findOne(['id' => $month['id']]);
                            } else {
                                $monthTuple = new BudgetMonitoringMonth();
                                $monthTuple->budget_monitoring_detail_id = $detailTuple->id;
                                $monthTuple->bmv_month = $key2;
                            }

                            if (!$monthTuple->load(['BudgetMonitoringMonth' => $month]) || !$monthTuple->save()) {
                                $errors = array_merge($errors, $monthTuple->errors);
                                throw new Exception();
                            }
                        }
                    }
                }
            }

            $transaction->commit();
            return TRUE;

        } catch (Exception $e) {
            $transaction->rollBack();
            $this->afterFind();

            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }

            return FALSE;
        }
    }

    public function afterFind() {
        parent::afterFind();
        $this->form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $this->form_type_code);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetMonitoringDetails()
    {
        return $this->hasMany(BudgetMonitoringDetail::className(), ['budget_monitoring_id' => 'id']);
    }
}
