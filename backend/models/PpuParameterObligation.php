<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppu_parameter_obligation".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property string $ppupo_parameter_code
 * @property string $ppupo_parameter_unit_code
 * @property string $ppupo_qs
 * @property string $ppupo_qs_unit_code
 * @property string $ppupo_qs_ref
 * @property string $ppupo_qs_max_pollution_load
 * @property string $ppupo_qs_load_unit_code
 * @property string $ppupo_qs_max_pollution_load_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionSource $ppuEmissionSource
 * @property PpupoMonth[] $ppupoMonths
 */
class PpuParameterObligation extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_parameter_obligation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppupo_parameter_code', 'ppupo_qs', 'ppupo_qs_unit_code', 'ppupo_qs_ref', 'ppupo_qs_max_pollution_load', 'ppupo_qs_load_unit_code', 'ppupo_qs_max_pollution_load_ref'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppupo_qs', 'ppupo_qs_max_pollution_load'], 'number'],
            [['ppupo_parameter_code', 'ppupo_parameter_unit_code', 'ppupo_qs_unit_code', 'ppupo_qs_load_unit_code'], 'string', 'max' => 10],
            [['ppupo_qs_ref', 'ppupo_qs_max_pollution_load_ref'], 'string', 'max' => 255],
            [['ppu_emission_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuEmissionSource::className(), 'targetAttribute' => ['ppu_emission_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_emission_source_id' => AppLabels::EMISSION_SOURCE,
            'ppupo_parameter_code' => AppLabels::WATCHED_PARAMETER,
            'ppupo_parameter_unit_code' => AppLabels::PARAMETER_UNIT,
            'ppupo_qs' => AppLabels::QUALITY_STANDARD,
            'ppupo_qs_unit_code' => AppLabels::QUALITY_STANDARD_UNIT,
            'ppupo_qs_ref' => AppLabels::QUALITY_STANDARD_REF,
            'ppupo_qs_max_pollution_load' => AppLabels::MAXIMUM_QS_POLLUTION_LOAD,
            'ppupo_qs_load_unit_code' => AppLabels::QS_LOAD_UNIT,
            'ppupo_qs_max_pollution_load_ref' => AppLabels::MAXIMUM_QS_POLLUTION_LOAD_REF,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionSource()
    {
        return $this->hasOne(PpuEmissionSource::className(), ['id' => 'ppu_emission_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpupoMonths()
    {
        return $this->hasMany(PpupoMonth::className(), ['ppu_parameter_obligation_id' => 'id']);
    }
}