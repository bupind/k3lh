<?php

namespace backend\models;

use common\vendor\AppConstants;

/**
 * This is the model class for table "whm_month".
 *
 * @property integer $id
 * @property integer $working_hour_monitoring_id
 * @property integer $whmm_quantity
 * @property integer $whmm_month
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkingHourMonitoring $workingHourMonitoring
 */
class WhmMonth extends AppModel
{
    public $whmm_quantity_display;
    public $whmm_manhours;
    public $whmm_manhours_accu;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'whm_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['working_hour_monitoring_id', 'whmm_month'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['working_hour_monitoring_id', 'whmm_quantity', 'whmm_month'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['working_hour_monitoring_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingHourMonitoring::className(), 'targetAttribute' => ['working_hour_monitoring_id' => 'id']],
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->whmm_quantity_display = $this->whmm_quantity;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'working_hour_monitoring_id' => 'Working Hour Monitoring ID',
            'whmm_quantity' => 'J. Pekerja',
            'whmm_quantity_display' => 'J. Pekerja',
            'whmm_month' => 'Bulan',
            'whmm_manhours' => 'Manhours',
            'whmm_manhours_accu' => 'Akumulasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingHourMonitoring()
    {
        return $this->hasOne(WorkingHourMonitoring::className(), ['id' => 'working_hour_monitoring_id']);
    }
}
