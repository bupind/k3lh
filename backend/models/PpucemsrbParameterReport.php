<?php

namespace backend\models;

use common\components\helpers\Converter;
use Yii;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\base\Exception;

/**
 * This is the model class for table "ppucemsrb_parameter_report".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property integer $ppucems_report_bm_id
 * @property string $ppucemsrbpr_quarter
 * @property string $ppucemsrbpr_calc_date
 * @property string $ppucemsrbpr_avg_concentration
 * @property string $ppucemsrbpr_calc_result
 * @property integer $ppucemsrbpr_operation_time
 * @property string $ppucemsrbpr_qs
 * @property string $ppucemsrbpr_qs_unit_code
 * @property string $ppucemsrbpr_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpucemsReportBm $ppucemsReportBm
 * @property PpuEmissionSource $ppuEmissionSource
 */
class PpucemsrbParameterReport extends AppModel
{
    public $ppucemsrbpr_avg_concentration_display;
    public $ppucemsrbpr_calc_result_display;
    public $ppucemsrbpr_qs_display;
    public $ppucemsrbpr_qs_unit_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppucemsrb_parameter_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppucems_report_bm_id', 'ppucemsrbpr_quarter', 'ppucemsrbpr_calc_date', 'ppucemsrbpr_avg_concentration', 'ppucemsrbpr_calc_result', 'ppucemsrbpr_operation_time', 'ppucemsrbpr_qs', 'ppucemsrbpr_qs_unit_code', 'ppucemsrbpr_ref'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id', 'ppucems_report_bm_id', 'ppucemsrbpr_operation_time'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppucemsrbpr_calc_date'], 'safe'],
            [['ppucemsrbpr_avg_concentration', 'ppucemsrbpr_calc_result', 'ppucemsrbpr_qs'], 'number'],
            [['ppucemsrbpr_quarter'], 'string', 'max' => 30],
            [['ppucemsrbpr_qs_unit_code'], 'string', 'max' => 10],
            [['ppucemsrbpr_ref'], 'string', 'max' => 50],
            [['ppucems_report_bm_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpucemsReportBm::className(), 'targetAttribute' => ['ppucems_report_bm_id' => 'id']],
            [['ppu_emission_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuEmissionSource::className(), 'targetAttribute' => ['ppu_emission_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_emission_source_id' => AppLabels::EMISSION_SOURCE,
            'ppucems_report_bm_id' => AppLabels::PARAMETER,
            'ppucemsrbpr_quarter' => AppLabels::QUARTER,
            'ppucemsrbpr_calc_date' => AppLabels::DATE,
            'ppucemsrbpr_avg_concentration' => sprintf("%s (%s)", AppLabels::AVERAGE_CONCENTRATION, AppLabels::MGNM3_UNIT),
            'ppucemsrbpr_calc_result' => sprintf("%s (%s)", AppLabels::BARISTAND_CALC_RESULT, AppLabels::MGNM3_UNIT),
            'ppucemsrbpr_operation_time' => sprintf("%s %s (%s))", AppLabels::OPERATION_TIME, AppLabels::CEMS, AppLabels::HOUR),
            'ppucemsrbpr_qs' => AppLabels::QUALITY_STANDARD,
            'ppucemsrbpr_qs_unit_code' => AppLabels::QS_LOAD_UNIT,
            'ppucemsrbpr_ref' => AppLabels::QUALITY_STANDARD_REF,
            'ppucemsrbpr_avg_concentration_display' =>  sprintf("%s (%s)", AppLabels::AVERAGE_CONCENTRATION, AppLabels::MGNM3_UNIT),
            'ppucemsrbpr_calc_result_display' => sprintf("%s (%s)", AppLabels::BARISTAND_CALC_RESULT, AppLabels::MGNM3_UNIT),
            'ppucemsrbpr_qs_display' => AppLabels::QUALITY_STANDARD,
        ];
    }

    public function saveTransactional() {
        $request = Yii::$app->request->post();

        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            $date = $this->ppucemsrbpr_calc_date;
            $this->ppucemsrbpr_quarter = $this->convertToQuarter($date);
            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $transaction->commit();
            return TRUE;
        } catch (Exception $ex) {
            $transaction->rollBack();
            $this->afterFind();

            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }

            return FALSE;
        }
    }

    public function convertToQuarter($date){
        $data = explode("-", $date);
        $month = intval($data[1]);
        if($month <= 3){
            $month = Converter::toRoman(1);
        }else{
            if($month <= 6){
                $month = Converter::toRoman(2);
            }else{
                if($month <= 9){
                    $month = Converter::toRoman(3);
                }else{
                    if($month <= 12){
                        $month = Converter::toRoman(4);
                    }
                }
            }
        }

        $result = sprintf("%s %s %s", AppLabels::QUARTER, $month, $data[2]);

        return $result;
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $this->ppucemsrbpr_calc_date = Yii::$app->formatter->asDate($this->ppucemsrbpr_calc_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        $this->ppucemsrbpr_calc_date = Yii::$app->formatter->asDate($this->ppucemsrbpr_calc_date, AppConstants::FORMAT_DATE_PHP);
        $this->ppucemsrbpr_avg_concentration_display = $this->ppucemsrbpr_avg_concentration;
        $this->ppucemsrbpr_calc_result_display = $this->ppucemsrbpr_calc_result;
        $this->ppucemsrbpr_qs_display = $this->ppucemsrbpr_qs;
        $this->ppucemsrbpr_qs_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUCEMS_RBM_PARAM_REPORT_QS_UNIT_CODE, $this->ppucemsrbpr_qs_unit_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpucemsReportBm()
    {
        return $this->hasOne(PpucemsReportBm::className(), ['id' => 'ppucems_report_bm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionSource()
    {
        return $this->hasOne(PpuEmissionSource::className(), ['id' => 'ppu_emission_source_id']);
    }
}
