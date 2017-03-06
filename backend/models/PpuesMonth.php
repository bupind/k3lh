<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppues_month".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property integer $ppuesm_month
 * @property integer $ppuesm_year
 * @property string $ppuesm_operation_time
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionSource $ppuEmissionSource
 */
class PpuesMonth extends AppModel
{
    public $month_label;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppues_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppuesm_month', 'ppuesm_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id', 'ppuesm_month', 'ppuesm_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppuesm_operation_time'], 'number'],
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
            'ppu_emission_source_id' => AppLabels::EMISSION_SOURCE_MONITORED,
            'ppuesm_month' => AppLabels::MONTH,
            'ppuesm_year' => AppLabels::YEAR,
            'ppuesm_operation_time' => AppLabels::OPERATION_TIME,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $dt = new \DateTime();
        $dt->setDate($this->ppuesm_year, $this->ppuesm_month, 1);
        $this->month_label = $dt->format('M Y');

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionSource()
    {
        return $this->hasOne(PpuEmissionSource::className(), ['id' => 'ppu_emission_source_id']);
    }
}
