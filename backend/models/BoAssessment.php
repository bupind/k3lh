<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "bo_assessment".
 *
 * @property integer $id
 * @property integer $beyond_obedience_id
 * @property integer $boas_criteria_id
 * @property string $boa_value
 * @property string $boa_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BeyondObedience $beyondObedience
 * @property BoasCriteria $boasCriteria
 */
class BoAssessment extends AppModel
{
    /**
     * @inheritdoc
     */
    public $boa_value_display;

    public static function tableName()
    {
        return 'bo_assessment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beyond_obedience_id', 'boas_criteria_id', 'boa_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['beyond_obedience_id', 'boas_criteria_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['boa_value'], 'number'],
            [['boa_ref'], 'string', 'max' => 200],
            [['beyond_obedience_id'], 'exist', 'skipOnError' => true, 'targetClass' => BeyondObedience::className(), 'targetAttribute' => ['beyond_obedience_id' => 'id']],
            [['boas_criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoasCriteria::className(), 'targetAttribute' => ['boas_criteria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beyond_obedience_id' => AppLabels::BEYOND_OBEDIENCE,
            'boas_criteria_id' => AppLabels::CRITERIA,
            'boa_value' => sprintf("%s %s", AppLabels::VALUE, AppLabels::CRITERIA),
            'boa_ref' => AppLabels::DESCRIPTION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->boa_value_display = $this->boa_value;

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeyondObedience()
    {
        return $this->hasOne(BeyondObedience::className(), ['id' => 'beyond_obedience_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoasCriteria()
    {
        return $this->hasOne(BoasCriteria::className(), ['id' => 'boas_criteria_id']);
    }
}
