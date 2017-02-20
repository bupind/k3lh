<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppucmes_month".
 *
 * @property integer $id
 * @property integer $ppu_compulsory_monitored_emission_source_id
 * @property integer $ppucmesm_month
 * @property integer $ppucmesm_year
 * @property string $ppucmesm_operation_time
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuCompulsoryMonitoredEmissionSource $ppuCompulsoryMonitoredEmissionSource
 */
class PpucmesMonth extends AppModel
{
    public $month_label;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppucmes_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_compulsory_monitored_emission_source_id', 'ppucmesm_month', 'ppucmesm_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_compulsory_monitored_emission_source_id', 'ppucmesm_month', 'ppucmesm_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppucmesm_operation_time'], 'number'],
            [['ppu_compulsory_monitored_emission_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuCompulsoryMonitoredEmissionSource::className(), 'targetAttribute' => ['ppu_compulsory_monitored_emission_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_compulsory_monitored_emission_source_id' => AppLabels::EMISSION_SOURCE_MONITORED,
            'ppucmesm_month' => AppLabels::MONTH,
            'ppucmesm_year' => AppLabels::YEAR,
            'ppucmesm_operation_time' => AppLabels::OPERATION_TIME,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $dt = new \DateTime();
        $dt->setDate($this->ppucmesm_year, $this->ppucmesm_month, 1);
        $this->month_label = $dt->format('M Y');

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuCompulsoryMonitoredEmissionSource()
    {
        return $this->hasOne(PpuCompulsoryMonitoredEmissionSource::className(), ['id' => 'ppu_compulsory_monitored_emission_source_id']);
    }
}
