<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ppa_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property PpaSetupPermit[] $setupPermits
 * @property PpaTechnicalProvision $technicalProvision
 */
class Ppa extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'power_plant_id', 'ppa_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ppa_year'], 'integer'],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'ppa_year' => AppLabels::YEAR,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant() {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetupPermits() {
        return $this->hasMany(PpaSetupPermit::className(), ['ppa_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnicalProvision() {
        return $this->hasOne(PpaTechnicalProvision::className(), ['ppa_id' => 'id']);
    }
    
    public function getSummary() {
        return sprintf('%s - %s - %s', $this->sector->sector_name, $this->powerPlant->pp_name, $this->ppa_year);
    }
    
    public function getPollutionLoadBMDataSet() {
        $setupPermits = $this->setupPermits;
        $dataSet = [];
        
        foreach ($setupPermits as $keySP => $setupPermit) {
            $temp = [
                0 => $keySP + 1,
                1 => 0,
                2 => $setupPermit->ppasp_setup_point_name,
                15 => '',
                16 => '',
                17 => '',
            ];
            
            $dataSet[] = $temp;
            $reportBms = $setupPermit->ppaReportBmsNoFooterParams;
            $debit = $setupPermit->ppaReportBmDebit;
            $debitIOs = $debit->ppaInletOutlets;
            $production = $setupPermit->ppaReportBmProduction;
            $productionIOs = $production->ppaInletOutlets;
            
            foreach ($reportBms as $keyBM => $reportBm) {
                $dataCount = 0;
                $temp2 = [
                    '',
                    $keyBM + 1,
                    $reportBm->ppar_param_code_desc
                ];
                    
                if ($reportBm->ppar_param_code != AppConstants::PPA_RBM_PARAM_PH) {
                    if ($reportBm->ppar_qs_load_unit_code = AppConstants::QS_LOAD_UNIT_CODE_TON_PER_MONTH) {
                        foreach ($reportBm->ppaInletOutlets as $keyIO => $inletOutlet) {
                            $ioVal = ($inletOutlet->ppaio_outlet_value * $debitIOs[$keyIO]->ppaio_outlet_value) / 1000000;
                            $temp2[] = $ioVal;
            
                            if (!is_null($ioVal) && $ioVal > 0) {
                                $dataCount++;
                            }
                        }
                    } else {
                        if (!empty($reportBm->ppar_qs_max_pollution_load_display)) {
                            foreach ($reportBm->ppaInletOutlets as $keyIO => $inletOutlet) {
                                $ioVal = AppLabels::PPA_NO_DATA_DEBIT_FULL;
                                if (!empty($debitIOs[$keyIO]->ppaio_outlet_value) && !empty($productionIOs[$keyIO]->ppaio_outlet_value)) {
                                    $ioVal = ($inletOutlet->ppaio_outlet_value * $debitIOs[$keyIO]->ppaio_outlet_value) / $productionIOs[$keyIO]->ppaio_outlet_value;
                                    
                                    if ($reportBm->ppar_qs_load_unit_code != AppConstants::QS_LOAD_UNIT_CODE_GRAM_PER_M3) {
                                        $ioVal *= 0.001;
                                    }
                                }
                                
                                $temp2[] = $ioVal;
                            }
                        }
                    }
                }
    
                $temp2[15] = $reportBm->ppar_qs_max_pollution_load_display;
                $temp2[] = $reportBm->ppar_qs_load_unit_code_desc;
                $temp2[] = (!empty($temp2[2]) && !empty($temp2[15]) && $temp2[16]) ? $dataCount : '';
                
                $dataSet[] = $temp2;
            }
        }
        
        return $dataSet;
    }
    
    public function getPollutionLoadActualDataSet() {
        $setupPermits = $this->setupPermits;
        $dataSet = [];
        
        foreach ($setupPermits as $keySP => $setupPermit) {
            $temp = [
                0 => $keySP + 1,
                1 => 0,
                2 => $setupPermit->ppasp_setup_point_name,
                15 => '',
                16 => '',
                17 => '',
                18 => '',
                19 => '',
            ];
            
            $dataSet[] = $temp;
            $reportBms = $setupPermit->ppaReportBmsNoFooterParams;
            $debit = $setupPermit->ppaReportBmDebit;
            $debitIOs = $debit->ppaInletOutlets;
            $production = $setupPermit->ppaReportBmProduction;
            
            foreach ($reportBms as $keyBM => $reportBm) {
                $pollutionLoadTotal = 0;
                $temp2 = [
                    '',
                    $keyBM + 1,
                    $reportBm->ppar_param_code_desc
                ];
                
                if ($reportBm->ppar_param_code != AppConstants::PPA_RBM_PARAM_PH) {
                    foreach ($reportBm->ppaInletOutlets as $keyIO => $inletOutlet) {
                        $ioVal = AppLabels::PPA_NO_DATA_DEBIT;
                        if (!empty($debitIOs[$keyIO]->ppaio_outlet_value)) {
                            $ioVal = $inletOutlet->ppaio_outlet_value * $debitIOs[$keyIO]->ppaio_outlet_value;
                            $pollutionLoadTotal += $ioVal;
                        }
        
                        $temp2[] = $ioVal;
                    }
                }
                
                $temp2[15] = $debit->ppar_param_unit_code_desc;
                $temp2[] = $production->ppar_param_unit_code_desc;
                $temp2[] = $pollutionLoadTotal;
                $temp2[] = $pollutionLoadTotal > 0 ? $pollutionLoadTotal / 1000 : 0;
                $temp2[] = $pollutionLoadTotal > 0 ? $pollutionLoadTotal / 1000000 : 0;

                $dataSet[] = $temp2;
            }
        }
        
        return $dataSet;
    }
}
