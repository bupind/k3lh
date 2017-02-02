<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/**
 * This is the model class for table "budget_monitoring_detail".
 *
 * @property integer $id
 * @property integer $budget_monitoring_id
 * @property string $bmd_no_prk
 * @property string $bmd_program
 * @property integer $bmd_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BudgetMonitoring $budgetMonitoring
 * @property BudgetMonitoringMonth[] $budgetMonitoringMonths
 */
class BudgetMonitoringDetail extends AppModel
{
    public $bmd_value_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget_monitoring_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['budget_monitoring_id', 'bmd_no_prk', 'bmd_program', 'bmd_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['budget_monitoring_id', 'bmd_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['bmd_no_prk'], 'string', 'max' => 150],
            [['bmd_program'], 'string', 'max' => 255],
            [['budget_monitoring_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetMonitoring::className(), 'targetAttribute' => ['budget_monitoring_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'budget_monitoring_id' => AppLabels::ATTRIBUTE_TYPE,
            'bmd_no_prk' => AppLabels::PRK_NUMBER,
            'bmd_program' => AppLabels::PROGRAM,
            'bmd_value' => AppLabels::VALUE,
            'bmd_value_display' => AppLabels::VALUE
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->bmd_value_display = $this->bmd_value;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetMonitoring()
    {
        return $this->hasOne(BudgetMonitoring::className(), ['id' => 'budget_monitoring_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetMonitoringMonths()
    {
        return $this->hasMany(BudgetMonitoringMonth::className(), ['budget_monitoring_detail_id' => 'id']);
    }
}
