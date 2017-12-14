<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "maturity_level_k3l_question".
 *
 * @property integer $id
 * @property integer $maturity_level_k3l_title_id
 * @property string $q_action_plan
 * @property string $q_criteria
 * @property string $q_eviden
 * @property string $q_unit_code
 * @property string $q_weight
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaturityLevelK3lTitle $maturityLevelK3lTitle
 */
class MaturityLevelK3lQuestion extends AppModel
{
    public $q_unit_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maturity_level_k3l_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maturity_level_k3l_title_id', 'q_action_plan', 'q_criteria', 'q_eviden', 'q_unit_code', 'q_weight'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['maturity_level_k3l_title_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['q_action_plan', 'q_criteria', 'q_eviden'], 'string'],
            [['q_weight'], 'number'],
            [['q_unit_code'], 'string', 'max' => 10],
            [['maturity_level_k3l_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevelK3lTitle::className(), 'targetAttribute' => ['maturity_level_k3l_title_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'q_eviden' => AppLabels::EVIDEN,
            'maturity_level_k3l_title_id' => AppLabels::TITLE,
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
    public function getMaturityLevelK3lDetails() {
        return $this->hasMany(MaturityLevelK3lDetail::className(), ['maturity_level_k3l_question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelK3lTitle()
    {
        return $this->hasOne(MaturityLevelK3lTitle::className(), ['id' => 'maturity_level_k3l_title_id']);
    }

    public function getActionPlanShort() {
        return StringHelper::byteSubstr($this->q_action_plan, 0, 50) . '...';
    }
}
