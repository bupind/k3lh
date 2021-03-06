<?php

namespace backend\models;

use common\vendor\AppLabels;

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
class PpaInletOutlet extends AppModel {
    
    public $month_label;
    public $ppaio_inlet_value_display;
    public $ppaio_outlet_value_display;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_inlet_outlet';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_report_bm_id'], 'required'],
            [['ppa_report_bm_id', 'ppaio_month', 'ppaio_year'], 'integer'],
            [['ppaio_inlet_value', 'ppaio_outlet_value'], 'number'],
            [['ppa_report_bm_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaReportBm::className(), 'targetAttribute' => ['ppa_report_bm_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_report_bm_id' => AppLabels::BM_REPORT_PARAMETER,
            'ppaio_month' => AppLabels::MONTH,
            'ppaio_year' => AppLabels::YEAR,
            'ppaio_inlet_value' => AppLabels::INLET_VALUE,
            'ppaio_inlet_value_display' => AppLabels::INLET_VALUE,
            'ppaio_outlet_value' => AppLabels::OUTLET_VALUE,
            'ppaio_outlet_value_display' => AppLabels::OUTLET_VALUE,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->ppaio_inlet_value += 0;
        $this->ppaio_outlet_value += 0;
        
        $dt = new \DateTime();
        $dt->setDate($this->ppaio_year, $this->ppaio_month, 1);
        $this->month_label = $dt->format('M Y');
        
        $this->ppaio_inlet_value_display = $this->ppaio_inlet_value;
        $this->ppaio_outlet_value_display = $this->ppaio_outlet_value;
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaReportBm() {
        return $this->hasOne(PpaReportBm::className(), ['id' => 'ppa_report_bm_id']);
    }
}
