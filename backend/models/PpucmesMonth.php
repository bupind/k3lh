<?php

namespace backend\models;

use Yii;

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
class PpucmesMonth extends \yii\db\ActiveRecord
{
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
            [['ppu_compulsory_monitored_emission_source_id', 'ppucmesm_month', 'ppucmesm_year', 'ppucmesm_operation_time', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppu_compulsory_monitored_emission_source_id', 'ppucmesm_month', 'ppucmesm_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
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
            'ppu_compulsory_monitored_emission_source_id' => 'Ppu Compulsory Monitored Emission Source ID',
            'ppucmesm_month' => 'Ppucmesm Month',
            'ppucmesm_year' => 'Ppucmesm Year',
            'ppucmesm_operation_time' => 'Ppucmesm Operation Time',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuCompulsoryMonitoredEmissionSource()
    {
        return $this->hasOne(PpuCompulsoryMonitoredEmissionSource::className(), ['id' => 'ppu_compulsory_monitored_emission_source_id']);
    }
}
