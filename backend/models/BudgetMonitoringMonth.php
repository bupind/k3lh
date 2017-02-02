<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/**
 * This is the model class for table "budget_monitoring_month".
 *
 * @property integer $id
 * @property integer $budget_monitoring_detail_id
 * @property integer $bmv_month
 * @property integer $bmv_plan_value
 * @property integer $bmv_realization_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BudgetMonitoringDetail $budgetMonitoringDetail
 */
class BudgetMonitoringMonth extends AppModel
{
    public $bmv_plan_value_display;
    public $bmv_realization_value_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget_monitoring_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['budget_monitoring_detail_id', 'bmv_month'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['budget_monitoring_detail_id', 'bmv_month', 'bmv_plan_value', 'bmv_realization_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['budget_monitoring_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetMonitoringDetail::className(), 'targetAttribute' => ['budget_monitoring_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'budget_monitoring_detail_id' => AppLabels::ATTRIBUTE_TYPE,
            'bmv_month' => AppLabels::MONTH,
            'bmv_plan_value' => AppLabels::PLAN_VALUE,
            'bmv_plan_value_display' => AppLabels::PLAN,
            'bmv_realization_value' => AppLabels::REALIZATION_VALUE,
            'bmv_realization_value_display' => AppLabels::REALIZATION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->bmv_plan_value_display = $this->bmv_plan_value;
        $this->bmv_realization_value_display = $this->bmv_realization_value;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetMonitoringDetail()
    {
        return $this->hasOne(BudgetMonitoringDetail::className(), ['id' => 'budget_monitoring_detail_id']);
    }
}
