<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "maturity_level_question".
 *
 * @property integer $id
 * @property integer $maturity_level_title_id
 * @property string $q_action_plan
 * @property string $q_criteria
 * @property string $q_unit_code
 * @property string $q_weight
 *
 * @property MaturityLevelDetail[] $maturityLevelDetails
 * @property MaturityLevelTitle $maturityLevelTitle
 */
class MaturityLevelQuestion extends AppModel {
    
    public $q_unit_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'maturity_level_question';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['maturity_level_title_id', 'q_unit_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['maturity_level_title_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['q_action_plan', 'q_criteria'], 'string'],
            [['q_weight'], 'number'],
            [['q_unit_code'], 'string', 'max' => 10],
            [['maturity_level_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevelTitle::className(), 'targetAttribute' => ['maturity_level_title_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'maturity_level_title_id' => AppLabels::TITLE,
            'q_action_plan' => AppLabels::ACTION_PLAN,
            'q_criteria' => AppLabels::CRITERIA,
            'q_unit_code' => AppLabels::UNIT,
            'q_weight' => AppLabels::WEIGHT,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->q_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_UNIT_CODE, $this->q_unit_code);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelDetails() {
        return $this->hasMany(MaturityLevelDetail::className(), ['maturity_level_question_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelTitle() {
        return $this->hasOne(MaturityLevelTitle::className(), ['id' => 'maturity_level_title_id']);
    }
    
    public function getActionPlanShort() {
        return StringHelper::byteSubstr($this->q_action_plan, 0, 50) . '...';
    }
}
