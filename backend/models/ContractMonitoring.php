<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "contract_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $cm_name
 * @property string $cm_prk
 * @property string $cm_pagu
 * @property string $cm_aoai
 * @property string $cm_prog_status
 * @property string $cm_tor_rab_status
 * @property string $cm_tor_rab_date
 * @property string $cm_nd_number
 * @property string $cm_nd_date
 * @property string $cm_gm_status
 * @property string $cm_gm_date
 * @property string $cm_procure_receiver
 * @property string $cm_date
 * @property string $cm_method
 * @property string $cm_contr_number
 * @property string $cm_contr_start_date
 * @property string $cm_contr_end_date
 * @property string $cm_contr_value
 * @property string $cm_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class ContractMonitoring extends AppModel
{
    public $cm_pagu_display;
    public $cm_contr_value_display;
    public $cm_aoai_desc;
    public $cm_prog_status_desc;
    public $cm_tor_rab_status_desc;
    public $cm_gm_status_desc;
    public $cm_procure_receiver_desc;
    public $cm_method_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'cm_name', 'cm_prk', 'cm_pagu', 'cm_aoai', 'cm_prog_status'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['cm_tor_rab_date', 'cm_nd_date', 'cm_gm_date', 'cm_date', 'cm_contr_start_date', 'cm_contr_end_date'], 'safe'],
            [['cm_ref'], 'string'],
            [['cm_name', 'cm_contr_value'], 'string', 'max' => 100],
            [['cm_prk', 'cm_pagu', 'cm_nd_number', 'cm_contr_number'], 'string', 'max' => 50],
            [['cm_aoai', 'cm_prog_status', 'cm_tor_rab_status', 'cm_gm_status', 'cm_procure_receiver', 'cm_method'], 'string', 'max' => 10],
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
            'cm_name' => AppLabels::PROGRAM,
            'cm_prk' => AppLabels::PRK_NUMBER,
            'cm_pagu' => "Nilai Pagu (Rp.)",
            'cm_pagu_display' => "Nilai Pagu (Rp.)",
            'cm_aoai' => 'AO/AI',
            'cm_prog_status' => sprintf("%s %s", AppLabels::PROGRAM, AppLabels::STATUS),
            'cm_tor_rab_status' => AppLabels::STATUS,
            'cm_tor_rab_date' => AppLabels::DATE,
            'cm_nd_number' => AppLabels::NUMBER,
            'cm_nd_date' => AppLabels::DATE,
            'cm_gm_status' => AppLabels::STATUS,
            'cm_gm_date' => AppLabels::DATE,
            'cm_procure_receiver' => "Diterima oleh",
            'cm_date' => AppLabels::DATE,
            'cm_method' => AppLabels::METHOD,
            'cm_contr_number' => AppLabels::NUMBER,
            'cm_contr_start_date' => AppLabels::DATE,
            'cm_contr_end_date' => AppLabels::END_DATE,
            'cm_contr_value' => "Nilai Kontrak (Rp.)",
            'cm_contr_value_display' => "Nilai Kontrak (Rp.)",
            'cm_ref' => AppLabels::DESCRIPTION,
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->cm_tor_rab_date == '') {
            $this->cm_tor_rab_date = Yii::$app->formatter->asDate($this->cm_tor_rab_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->cm_nd_date == '') {
            $this->cm_nd_date = Yii::$app->formatter->asDate($this->cm_nd_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->cm_gm_date == '') {
            $this->cm_gm_date = Yii::$app->formatter->asDate($this->cm_gm_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->cm_date == '') {
            $this->cm_date = Yii::$app->formatter->asDate($this->cm_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->cm_contr_start_date == '') {
            $this->cm_contr_start_date = Yii::$app->formatter->asDate($this->cm_contr_start_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->cm_contr_end_date == '') {
            $this->cm_contr_end_date = Yii::$app->formatter->asDate($this->cm_contr_end_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->cm_tor_rab_date == '') {
            $this->cm_tor_rab_date = Yii::$app->formatter->asDate($this->cm_tor_rab_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->cm_nd_date == '') {
            $this->cm_nd_date = Yii::$app->formatter->asDate($this->cm_nd_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->cm_gm_date == '') {
            $this->cm_gm_date = Yii::$app->formatter->asDate($this->cm_gm_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->cm_date == '') {
            $this->cm_date = Yii::$app->formatter->asDate($this->cm_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->cm_contr_start_date == '') {
            $this->cm_contr_start_date = Yii::$app->formatter->asDate($this->cm_contr_start_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->cm_contr_end_date == '') {
            $this->cm_contr_end_date = Yii::$app->formatter->asDate($this->cm_contr_end_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        $this->cm_aoai_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_AOAI_TYPE, $this->cm_aoai);
        $this->cm_prog_status_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_PROG_STATUS_TYPE, $this->cm_prog_status);
        $this->cm_tor_rab_status_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_TOR_RAB_STATUS_TYPE, $this->cm_tor_rab_status);
        $this->cm_gm_status_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_GM_STATUS_TYPE, $this->cm_gm_status);
        $this->cm_procure_receiver_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_PROCURE_RECEIVER_TYPE, $this->cm_procure_receiver);
        $this->cm_method_desc = Codeset::getCodesetValue(AppConstants::CODESET_CM_METHOD_TYPE, $this->cm_method);
        $this->cm_pagu_display = $this->cm_pagu;
        $this->cm_contr_value_display = $this->cm_contr_value;

        return true;
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
}
