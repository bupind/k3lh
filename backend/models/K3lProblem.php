<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "k3l_problem".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $kp_problem_number
 * @property string $kp_date
 * @property string $kp_problem_description
 * @property string $kp_mitigation_plan
 * @property string $kp_mitigation_dateline_date
 * @property string $kp_status_code
 * @property integer $kp_progress
 * @property string $kp_description
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class K3lProblem extends AppModel
{
    public $kp_status_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'k3l_problem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'kp_problem_number', 'kp_problem_description', 'kp_mitigation_plan'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'kp_progress'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['kp_date', 'kp_mitigation_dateline_date'], 'safe'],
            [['kp_problem_description', 'kp_mitigation_plan'], 'string'],
            [['kp_problem_number'], 'string', 'max' => 100],
            [['kp_status_code'], 'string', 'max' => 10],
            [['kp_description'], 'string', 'max' => 255],
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
            'kp_problem_number' => AppLabels::KP_PROBLEM_NUMBER,
            'kp_date' => AppLabels::DATE,
            'kp_problem_description' => AppLabels::KP_PROBLEM_DESCRIPTION,
            'kp_mitigation_plan' => AppLabels::KP_MITIGATION_PLAN,
            'kp_mitigation_dateline_date' => AppLabels::KP_MITIGATION_DATELINE_DATE,
            'kp_status_code' => AppLabels::KP_STATUS,
            'kp_progress' => AppLabels::KP_PROGRESS,
            'kp_description' => AppLabels::DESCRIPTION,
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->kp_date == '') {
            $this->kp_date = Yii::$app->formatter->asDate($this->kp_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->kp_mitigation_dateline_date == '') {
            $this->kp_mitigation_dateline_date = Yii::$app->formatter->asDate($this->kp_mitigation_dateline_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {

        if(!$this->kp_date == '') {
            $this->kp_date = Yii::$app->formatter->asDate($this->kp_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->kp_mitigation_dateline_date == '') {
            $this->kp_mitigation_dateline_date = Yii::$app->formatter->asDate($this->kp_mitigation_dateline_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        $this->kp_status_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_KP_STATUS_CODE, $this->kp_status_code);

        return true;
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
}
