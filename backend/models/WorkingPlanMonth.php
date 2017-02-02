<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "working_plan_month".
 *
 * @property integer $id
 * @property integer $working_plan_detail_id
 * @property integer $wpm_month
 * @property integer $wpm_week
 * @property integer $wpm_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkingPlanDetail $workingPlanDetail
 */
class WorkingPlanMonth extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'working_plan_month';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['working_plan_detail_id', 'wpm_month', 'wpm_week', 'wpm_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['working_plan_detail_id', 'wpm_month', 'wpm_week', 'wpm_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['working_plan_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingPlanDetail::className(), 'targetAttribute' => ['working_plan_detail_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'working_plan_detail_id' => AppLabels::WORKING_PLAN,
            'wpm_month' => AppLabels::MONTH,
            'wpm_week' => AppLabels::WEEK,
            'wpm_value' => AppLabels::VALUE,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlanDetail() {
        return $this->hasOne(WorkingPlanDetail::className(), ['id' => 'working_plan_detail_id']);
    }
}
