<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppu_emission_load_grk_calc".
 *
 * @property integer $id
 * @property integer $ppu_emission_load_grk_id
 * @property integer $ppueglc_year
 * @property string $ppueglc_coal_usage
 * @property integer $ppueglc_carbon_content
 * @property integer $ppueglc_carbon_actual_content
 * @property integer $ppueglc_mw_carbondioxyde
 * @property integer $ppueglc_anc
 * @property string $ppueglc_oxidation_factor
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionLoadGrk $ppuEmissionLoadGrk
 */
class PpuEmissionLoadGrkCalc extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_emission_load_grk_calc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_load_grk_id', 'ppueglc_year', 'ppueglc_coal_usage', 'ppueglc_carbon_content', 'ppueglc_carbon_actual_content', 'ppueglc_mw_carbondioxyde', 'ppueglc_anc', 'ppueglc_oxidation_factor'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_load_grk_id', 'ppueglc_year', 'ppueglc_carbon_content', 'ppueglc_carbon_actual_content', 'ppueglc_mw_carbondioxyde', 'ppueglc_anc'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppueglc_coal_usage', 'ppueglc_oxidation_factor'], 'number'],
            [['ppu_emission_load_grk_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuEmissionLoadGrk::className(), 'targetAttribute' => ['ppu_emission_load_grk_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_emission_load_grk_id' => sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK ),
            'ppueglc_year' => AppLabels::YEAR,
            'ppueglc_coal_usage' => AppLabels::COAL_USAGE,
            'ppueglc_carbon_content' => AppLabels::CARBON_CONTENT,
            'ppueglc_carbon_actual_content' => AppLabels::ACTUAL_CARBON_CONTENT,
            'ppueglc_mw_carbondioxyde' => sprintf("%s %s", AppLabels::MW, AppLabels::CO2),
            'ppueglc_anc' => AppLabels::ANC,
            'ppueglc_oxidation_factor' => AppLabels::OXIDATION_FACTOR,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionLoadGrk()
    {
        return $this->hasOne(PpuEmissionLoadGrk::className(), ['id' => 'ppu_emission_load_grk_id']);
    }
}
