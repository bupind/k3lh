<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppa_inlet_outlet".
 *
 * @property integer $id
 * @property integer $ppa_report_bm_id
 * @property integer $ppaio_month
 * @property integer $ppaio_year
 * @property string $ppaio_inlet_value
 * @property string $ppaio_outlet_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaReportBm $ppaReportBm
 */
class PpaInletOutlet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppa_inlet_outlet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppa_report_bm_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_report_bm_id', 'ppaio_month', 'ppaio_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppaio_inlet_value', 'ppaio_outlet_value'], 'number'],
            [['ppa_report_bm_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaReportBm::className(), 'targetAttribute' => ['ppa_report_bm_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppa_report_bm_id' => 'Ppa Report Bm ID',
            'ppaio_month' => 'Ppaio Month',
            'ppaio_year' => 'Ppaio Year',
            'ppaio_inlet_value' => 'Ppaio Inlet Value',
            'ppaio_outlet_value' => 'Ppaio Outlet Value',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaReportBm()
    {
        return $this->hasOne(PpaReportBm::className(), ['id' => 'ppa_report_bm_id']);
    }
}
