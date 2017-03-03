<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppucemsrb_quarter".
 *
 * @property integer $id
 * @property integer $ppucems_report_bm_id
 * @property string $ppucemsrbq_quarter
 * @property integer $ppucemsrbq_year
 * @property integer $ppucemsrbq_value
 * @property integer $ppucemsrbq_qs_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpucemsReportBm $ppucemsReportBm
 */
class PpucemsrbQuarter extends AppModel
{
    public $ppucemsrbq_value_percent_display;
    public $ppucemsrbq_qs_value_percent_display;

    public $ppucemsrbq_value_percent_view;
    public $ppucemsrbq_qs_value_percent_view;

    public $quarter_label;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppucemsrb_quarter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppucems_report_bm_id', 'ppucemsrbq_quarter', 'ppucemsrbq_year', 'ppucemsrbq_value', 'ppucemsrbq_qs_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppucems_report_bm_id', 'ppucemsrbq_year', 'ppucemsrbq_value', 'ppucemsrbq_qs_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppucemsrbq_quarter'], 'string', 'max' => 3],
            [['ppucems_report_bm_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpucemsReportBm::className(), 'targetAttribute' => ['ppucems_report_bm_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppucems_report_bm_id' => sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS),
            'ppucemsrbq_quarter' => AppLabels::QUARTER,
            'ppucemsrbq_year' => AppLabels::YEAR,
            'ppucemsrbq_value' => AppLabels::VALUE,
            'ppucemsrbq_value_percent_view' => AppLabels::PERCENTAGE,
            'ppucemsrbq_qs_value_percent_view' => AppLabels::PERCENTAGE,
            'ppucemsrbq_qs_value' => sprintf("%s %s", AppLabels::VALUE, AppLabels::QUALITY_STANDARD ),

        ];
    }

    public function afterFind(){
        parent::afterFind();

        $cemsConstant = [
            0 => 92,
            1 => 92,
            2 => 90,
            3 => 91,
        ];

        if($this->ppucemsrbq_quarter == "III") {
            $this->ppucemsrbq_value_percent_view = $this->ppucemsrbq_value / $cemsConstant[0] *100;
            $this->ppucemsrbq_value_percent_view = number_format($this->ppucemsrbq_value_percent_view);
            $this->ppucemsrbq_qs_value_percent_view = $this->ppucemsrbq_qs_value / $this->ppucemsrbq_value *100;
            $this->ppucemsrbq_qs_value_percent_view = number_format($this->ppucemsrbq_qs_value_percent_view);
        }

        if($this->ppucemsrbq_quarter == "IV") {
            $this->ppucemsrbq_value_percent_view = $this->ppucemsrbq_value / $cemsConstant[1] *100;
            $this->ppucemsrbq_value_percent_view = number_format($this->ppucemsrbq_value_percent_view);
            $this->ppucemsrbq_qs_value_percent_view = $this->ppucemsrbq_qs_value / $this->ppucemsrbq_value *100;
            $this->ppucemsrbq_qs_value_percent_view = number_format($this->ppucemsrbq_qs_value_percent_view);
        }

        if($this->ppucemsrbq_quarter == "I") {
            $this->ppucemsrbq_value_percent_view = $this->ppucemsrbq_value / $cemsConstant[2] *100;
            $this->ppucemsrbq_value_percent_view = number_format($this->ppucemsrbq_value_percent_view);
            $this->ppucemsrbq_qs_value_percent_view = $this->ppucemsrbq_qs_value / $this->ppucemsrbq_value *100;
            $this->ppucemsrbq_qs_value_percent_view = number_format($this->ppucemsrbq_qs_value_percent_view);
        }

        if($this->ppucemsrbq_quarter == "II") {
            $this->ppucemsrbq_value_percent_view = $this->ppucemsrbq_value / $cemsConstant[3] *100;
            $this->ppucemsrbq_value_percent_view = number_format($this->ppucemsrbq_value_percent_view);
            $this->ppucemsrbq_qs_value_percent_view = $this->ppucemsrbq_qs_value / $this->ppucemsrbq_value *100;
            $this->ppucemsrbq_qs_value_percent_view = number_format($this->ppucemsrbq_qs_value_percent_view);
        }

        $this->ppucemsrbq_value_percent_display = $this->ppucemsrbq_value;
        $this->ppucemsrbq_qs_value_percent_display = $this->ppucemsrbq_qs_value;

        $this->quarter_label = sprintf("%s %s-%s", AppLabels::QUARTER, $this->ppucemsrbq_quarter, $this->ppucemsrbq_year );

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpucemsReportBm()
    {
        return $this->hasOne(PpucemsReportBm::className(), ['id' => 'ppucems_report_bm_id']);
    }
}
