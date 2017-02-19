<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppu_compulsory_monitored_emission_source".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property string $ppucmes_name
 * @property string $ppucmes_operation_time
 * @property string $ppucmes_freq_monitoring_obligation_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppu $ppu
 * @property PpucmesMonth[] $ppucmesMonths
 */
class PpuCompulsoryMonitoredEmissionSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_compulsory_monitored_emission_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id', 'ppucmes_name', 'ppucmes_operation_time', 'ppucmes_freq_monitoring_obligation_code', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppu_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppucmes_operation_time'], 'number'],
            [['ppucmes_name'], 'string', 'max' => 150],
            [['ppucmes_freq_monitoring_obligation_code'], 'string', 'max' => 10],
            [['ppu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppu::className(), 'targetAttribute' => ['ppu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_id' => 'Ppu ID',
            'ppucmes_name' => 'Ppucmes Name',
            'ppucmes_operation_time' => 'Ppucmes Operation Time',
            'ppucmes_freq_monitoring_obligation_code' => 'Ppucmes Freq Monitoring Obligation Code',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpu()
    {
        return $this->hasOne(Ppu::className(), ['id' => 'ppu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpucmesMonths()
    {
        return $this->hasMany(PpucmesMonth::className(), ['ppu_compulsory_monitored_emission_source_id' => 'id']);
    }
}
