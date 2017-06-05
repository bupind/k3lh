<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "boc_detail".
 *
 * @property integer $id
 * @property integer $beyond_obedience_comdev_id
 * @property string $bocd_program
 * @property integer $bocd_public_income
 * @property integer $bocd_impact
 * @property integer $bocd_effort
 * @property integer $bocd_budget
 * @property string $bocd_unit_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BeyondObedienceComdev $beyondObedienceComdev
 */
class BocDetail extends AppModel
{
    public $bocd_unit_code_desc;
    public $bocd_public_income_display;
    public $bocd_effort_display;
    public $bocd_budget_display;
    public $bocd_impact_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boc_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beyond_obedience_comdev_id', 'bocd_program', 'bocd_public_income', 'bocd_impact', 'bocd_effort', 'bocd_budget'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['beyond_obedience_comdev_id', 'bocd_public_income', 'bocd_impact', 'bocd_effort', 'bocd_budget'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['bocd_program'], 'string', 'max' => 255],
            [['bocd_unit_code'], 'string', 'max' => 10],
            [['beyond_obedience_comdev_id'], 'exist', 'skipOnError' => true, 'targetClass' => BeyondObedienceComdev::className(), 'targetAttribute' => ['beyond_obedience_comdev_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beyond_obedience_comdev_id' => sprintf("%s %s", AppLabels::COMDEV,AppLabels::BEYOND_OBEDIENCE),
            'bocd_program' => AppLabels::PROGRAM,
            'bocd_public_income' => AppLabels::PUBLIC_INCOME,
            'bocd_impact' => AppLabels::BOC_IMPACT,
            'bocd_effort' => AppLabels::BOC_EFFORT,
            'bocd_budget' => AppLabels::BOC_BUDGET,
            'bocd_unit_code' => AppLabels::UNIT,

        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->bocd_public_income_display = $this->bocd_public_income;
        $this->bocd_impact_display = $this->bocd_impact;
        $this->bocd_effort_display = $this->bocd_effort;
        $this->bocd_budget_display = $this->bocd_budget;
        $this->bocd_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_BOP_UNIT_CODE, $this->bocd_unit_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeyondObedienceComdev()
    {
        return $this->hasOne(BeyondObedienceComdev::className(), ['id' => 'beyond_obedience_comdev_id']);
    }
}
