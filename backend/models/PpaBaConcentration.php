<?php

namespace backend\models;

use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_ba_consentration".
 *
 * @property integer $id
 * @property integer $ppa_ba_report_bm_id
 * @property integer $ppabac_month
 * @property integer $ppabac_year
 * @property string $ppabac_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaBaReportBm $ppaBaReportBm
 */
class PpaBaConcentration extends AppModel {
    
    public $month_label;
    public $ppabac_value_display;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_ba_concentration';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_ba_report_bm_id'], 'required'],
            [['ppa_ba_report_bm_id', 'ppabac_month', 'ppabac_year'], 'integer'],
            [['ppabac_value'], 'number'],
            [['ppa_ba_report_bm_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaBaReportBm::className(), 'targetAttribute' => ['ppa_ba_report_bm_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_ba_report_bm_id' => AppLabels::BM_REPORT_PARAMETER,
            'ppabac_month' => AppLabels::MONTH,
            'ppabac_year' => AppLabels::YEAR,
            'ppabac_value' => AppLabels::VALUE,
            'ppabac_value_display' => AppLabels::VALUE,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->ppabac_value += 0;
        
        $dt = new \DateTime();
        $dt->setDate($this->ppabac_year, $this->ppabac_month, 1);
        $this->month_label = $dt->format('M Y');
        
        $this->ppabac_value_display = $this->ppabac_value;
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaReportBm() {
        return $this->hasOne(PpaBaReportBm::className(), ['id' => 'ppa_ba_report_bm_id']);
    }
}
