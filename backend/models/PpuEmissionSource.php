<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppu_emission_source".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property string $ppues_name
 * @property string $ppues_chimney_name
 * @property integer $ppues_capacity
 * @property string $ppues_control_device
 * @property string $ppues_fuel_name_code
 * @property string $ppues_total_fuel
 * @property string $ppues_fuel_unit_code
 * @property string $ppues_operation_time
 * @property string $ppues_location
 * @property string $ppues_coord_ls
 * @property string $ppues_coord_bt
 * @property string $ppues_chimney_shape_code
 * @property string $ppues_chimney_height
 * @property string $ppues_chimney_diameter
 * @property integer $ppues_hole_position
 * @property string $ppues_monitoring_data_status_code
 * @property string $ppues_freq_monitoring_obligation_code
 * @property string $ppues_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class PpuEmissionSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_emission_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id', 'ppues_name', 'ppues_chimney_name', 'ppues_capacity', 'ppues_control_device', 'ppues_fuel_name_code', 'ppues_total_fuel', 'ppues_fuel_unit_code', 'ppues_operation_time', 'ppues_location', 'ppues_coord_ls', 'ppues_coord_bt', 'ppues_chimney_shape_code', 'ppues_chimney_height', 'ppues_chimney_diameter', 'ppues_hole_position', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code', 'ppues_ref'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_id', 'ppues_capacity', 'ppues_hole_position'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppues_total_fuel', 'ppues_operation_time', 'ppues_chimney_height', 'ppues_chimney_diameter'], 'number'],
            [['ppues_name', 'ppues_chimney_name', 'ppues_location'], 'string', 'max' => 150],
            [['ppues_control_device', 'ppues_ref'], 'string', 'max' => 255],
            [['ppues_fuel_name_code', 'ppues_fuel_unit_code', 'ppues_chimney_shape_code', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code'], 'string', 'max' => 10],
            [['ppues_coord_ls', 'ppues_coord_bt'], 'string', 'max' => 50],
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
            'ppues_name' => 'Ppues Name',
            'ppues_chimney_name' => 'Ppues Chimney Name',
            'ppues_capacity' => 'Ppues Capacity',
            'ppues_control_device' => 'Ppues Control Device',
            'ppues_fuel_name_code' => 'Ppues Fuel Name Code',
            'ppues_total_fuel' => 'Ppues Total Fuel',
            'ppues_fuel_unit_code' => 'Ppues Fuel Unit Code',
            'ppues_operation_time' => 'Ppues Operation Time',
            'ppues_location' => 'Ppues Location',
            'ppues_coord_ls' => 'Ppues Coord Ls',
            'ppues_coord_bt' => 'Ppues Coord Bt',
            'ppues_chimney_shape_code' => 'Ppues Chimney Shape Code',
            'ppues_chimney_height' => 'Ppues Chimney Height',
            'ppues_chimney_diameter' => 'Ppues Chimney Diameter',
            'ppues_hole_position' => 'Ppues Hole Position',
            'ppues_monitoring_data_status_code' => 'Ppues Monitoring Data Status Code',
            'ppues_freq_monitoring_obligation_code' => 'Ppues Freq Monitoring Obligation Code',
            'ppues_ref' => 'Ppues Ref',
        ];
    }
}
