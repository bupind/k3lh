<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "ppu".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ppu_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 *
 * @property PpuEmissionSource[] $ppuEmissionSources
 * @property PpuTechnicalProvision[] $ppuTechnicalProvisions
 */
class Ppu extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ppu_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ppu_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'ppu_year' => AppLabels::YEAR,
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionSources()
    {
        return $this->hasMany(PpuEmissionSource::className(), ['ppu_id' =>  'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisions()
    {
        return $this->hasMany(PpuTechnicalProvision::className(), ['ppu_id' =>  'id']);
    }

    public function getSummary() {
        return sprintf('%s - %s - %s', $this->sector->sector_name, $this->powerPlant->pp_name, $this->ppu_year);
    }


    public function getPpuEmissionLoadData(){
        $finalResult = [];
        $startDate = new \DateTime();
        $startDate->setDate($this->ppu_year - 1, 7, 1);

        $ppuEmissionSourceModel = PpuEmissionSource::find()->where([
            'ppu_id' => $this->id,
        ])->all();

        //EMISSION LOOP
        foreach($ppuEmissionSourceModel as $key1 => $pesModel){
            $id = $key1+1;
            $count = 0;
            $temp = [];
            $emissionRadius = $pesModel->ppues_chimney_diameter/2;
            $emissionWide = pi() * $emissionRadius * $emissionRadius;
            $emissionWide = number_format($emissionWide, 2);

            $ppucemsReportBmModel = PpucemsReportBm::find()->where([
                'ppu_emission_source_id' => $pesModel->id
            ])->all();


            $ppuParameterObligationModel = PpuParameterObligation::find()->where([
                'ppu_emission_source_id' => $pesModel->id,
                'ppupo_parameter_code' => AppConstants::PPU_RBM_PARAM_CODE_LAJUALIR,
            ])->one();

            $lajuAlirData = null;

            if(!is_null($ppuParameterObligationModel)) {
                $lajuAlirData = PpupoMonth::find()->where([
                    'ppu_parameter_obligation_id' => $ppuParameterObligationModel->id,
                ])->all();
            }

            $operationTimeData = PpuesMonth::find()->where([
                'ppu_emission_source_id' => $pesModel->id,
            ])->all();

            //PARAMETER LOOP
            foreach($ppucemsReportBmModel as $key2 => $prbModel){
                if($count == 0){
                    $temp[] = $id;
                    $temp[] = $pesModel->ppues_name;
                    $temp[] = $pesModel->ppues_chimney_name;
                    $temp[] = $emissionWide;
                    $count++;
                }else{
                    for($i=0; $i<4; $i++){
                        $temp[] = '';
                    }
                }
                $temp[] = $prbModel->ppucemsrb_parameter_code_desc;
                $emissionLoadTotal = 0;

                //MONTH LOOP
                for($i=0; $i<12; $i++) {
                    $ppuParameterReportModel = PpucemsrbParameterReport::find()->where([
                        'ppu_emission_source_id' => $pesModel->id,
                        'ppucems_report_bm_id' => $prbModel->id,
                        'ppucemsrbpr_month' => intval($startDate->format('m')),
                        'ppucemsrbpr_year' => intval($startDate->format('Y')),
                    ])->average('ppucemsrbpr_avg_concentration');

                    $result = $ppuParameterReportModel * $emissionWide;

                    if(!is_null($lajuAlirData)) {
                        $result *= $lajuAlirData[$key2]->ppupom_value;
                    }else{
                        //ERROR EXCEPTION IF LAJU ALIR IS EMPTY
                        exit;
                    }

                    $result *= pow(10, -7);
                    $result *= 3.6;

                    if($operationTimeData[$key2]->ppuesm_operation_time != 0){
                        $result *= $operationTimeData[$key2]->ppuesm_operation_time;
                    }

                    $result = number_format($result, 3);
                    $emissionLoadTotal+=$result;
                    $temp[] = $result;

                    $startDate->add(new \DateInterval('P1M'));
                }

                $startDate->setDate($this->ppu_year - 1, 7, 1);
                $temp[] = $emissionLoadTotal;
                $finalResult[] = $temp;
                $temp = [];
            }

            if(!is_null($ppuParameterObligationModel)) {
                //SPACE MAKER
                for ($i = 0; $i < 18; $i++) {
                    $temp[] = "";
                }
                $finalResult[] = $temp;
                $temp = [];
            }

            //LAJU ALIR
            for($i=0; $i<4; $i++){
                $temp[] = '';
            }



            if(!is_null($ppuParameterObligationModel)) {
                $lajuAlirData = PpupoMonth::find()->where([
                    'ppu_parameter_obligation_id' => $ppuParameterObligationModel->id,
                ])->all();

                $temp[] = 'Laju Alir';

                foreach ($lajuAlirData as $key4 => $lajuAlir) {
                    $temp[] = $lajuAlir->ppupom_value;
                }

                $temp[] = '';

                $finalResult[] = $temp;
            }
        }

        return $finalResult;
    }
}
