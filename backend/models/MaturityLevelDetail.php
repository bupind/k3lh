<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "maturity_level_detail".
 *
 * @property integer $id
 * @property integer $maturity_level_id
 * @property integer $maturity_level_question_id
 * @property string $mld_target
 * @property string $mld_realization
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaturityLevel $maturityLevel
 * @property MaturityLevelQuestion $maturityLevelQuestion
 * @property AttachmentOwner $attachmentOwner
 */
class MaturityLevelDetail extends AppModel {
    
    public $mld_target_display;
    public $mld_realization_display;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'maturity_level_detail';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['maturity_level_id', 'maturity_level_question_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['maturity_level_id', 'maturity_level_question_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['mld_target', 'mld_realization'], 'number'],
            [['maturity_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevel::className(), 'targetAttribute' => ['maturity_level_id' => 'id']],
            [['maturity_level_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevelQuestion::className(), 'targetAttribute' => ['maturity_level_question_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'maturity_level_id' => AppLabels::MATURITY_LEVEL,
            'maturity_level_question_id' => AppLabels::QUESTION,
            'mld_target' => AppLabels::TARGET,
            'mld_realization' => AppLabels::REALIZATION,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->mld_target_display = $this->mld_target;
        $this->mld_realization_display = $this->mld_realization;
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevel() {
        return $this->hasOne(MaturityLevel::className(), ['id' => 'maturity_level_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelQuestion() {
        return $this->hasOne(MaturityLevelQuestion::className(), ['id' => 'maturity_level_question_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner() {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_MATURITY_LEVEL]);
    }
}
