<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "working_plan_detail".
 *
 * @property integer $id
 * @property integer $working_plan_id
 * @property integer $working_plan_attribute_id
 * @property string $wpd_rnr
 * @property string $wpd_location
 * @property string $wpd_pic
 * @property integer $wpd_order
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkingPlanAttribute $workingPlanAttribute
 * @property WorkingPlan $workingPlan
 * @property WorkingPlanMonth[] $workingPlanMonths
 * @property AttachmentOwner $attachmentOwner
 */
class WorkingPlanDetail extends AppModel {
    
    public $monthly_progress;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'working_plan_detail';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['working_plan_id', 'working_plan_attribute_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['working_plan_id', 'working_plan_attribute_id', 'wpd_order'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['wpd_rnr'], 'string', 'max' => 2],
            [['wpd_location', 'wpd_pic'], 'string', 'max' => 100],
            [['working_plan_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingPlanAttribute::className(), 'targetAttribute' => ['working_plan_attribute_id' => 'id']],
            [['working_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingPlan::className(), 'targetAttribute' => ['working_plan_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'working_plan_id' => AppLabels::WORKING_PLAN,
            'working_plan_attribute_id' => AppLabels::ATTRIBUTE_TYPE,
            'wpd_rnr' => AppLabels::RNR,
            'wpd_location' => AppLabels::LOCATION,
            'wpd_pic' => AppLabels::PIC,
            'wpd_order' => AppLabels::ORDER
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $data = [];
        foreach ($this->workingPlanMonths as $month) {
            $data[$month->wpm_month][$month->wpm_week] = $month->wpm_value;
        }
        
        $this->monthly_progress = $data;
        
        return true;
    }
    
    public function beforeDelete() {
        parent::beforeDelete();
        
        if (!is_null($this->attachmentOwner)) {
            $this->attachmentOwner->attachment->delete();
        }
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlanAttribute() {
        return $this->hasOne(WorkingPlanAttribute::className(), ['id' => 'working_plan_attribute_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlan() {
        return $this->hasOne(WorkingPlan::className(), ['id' => 'working_plan_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlanMonths() {
        return $this->hasMany(WorkingPlanMonth::className(), ['working_plan_detail_id' => 'id'])->orderBy(['wpm_month' => SORT_ASC, 'wpm_week' => SORT_ASC]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner() {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_WORKING_PLAN]);
    }
}
