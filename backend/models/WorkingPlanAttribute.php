<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "working_plan_attribute".
 *
 * @property integer $id
 * @property string $attr_type_code
 * @property string $attr_text
 * @property integer $attr_parent_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkingPlanAttribute $attrParent
 * @property WorkingPlanAttribute[] $workingPlanAttributes
 * @property WorkingPlanDetail[] $workingPlanDetails
 */
class WorkingPlanAttribute extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'working_plan_attribute';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['attr_type_code', 'attr_text'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['attr_parent_id'], 'integer'],
            [['attr_type_code'], 'string', 'max' => 10],
            [['attr_text'], 'string', 'max' => 255],
            [['attr_parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingPlanAttribute::className(), 'targetAttribute' => ['attr_parent_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'attr_type_code' => AppLabels::ATTRIBUTE_TYPE,
            'attr_text' => AppLabels::TEXT,
            'attr_parent_id' => AppLabels::PARENT,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrParent() {
        return $this->hasOne(WorkingPlanAttribute::className(), ['id' => 'attr_parent_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlanAttributes() {
        return $this->hasMany(WorkingPlanAttribute::className(), ['attr_parent_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingPlanDetails() {
        return $this->hasMany(WorkingPlanDetail::className(), ['working_plan_attribute_id' => 'id']);
    }
}
