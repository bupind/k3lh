<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppu_emission_load_grk".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property string $ppuelg_parameter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionSource $ppuEmissionSource
 * @property PpuEmissionLoadGrkCalc[] $ppuEmissionLoadGrkCalcs
 */
class PpuEmissionLoadGrk extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_emission_load_grk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppuelg_parameter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppuelg_parameter'], 'string', 'max' => 40],
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
            'ppuelg_parameter' => AppLabels::PARAMETER,
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
    public function getPpuEmissionLoadGrkCalcs()
    {
        return $this->hasMany(PpuEmissionLoadGrkCalc::className(), ['ppu_emission_load_grk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPU_EMISSION_LOAD_GRK]);
    }
}
