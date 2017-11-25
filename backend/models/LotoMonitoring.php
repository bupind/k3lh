<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "loto_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $lm_key_name
 * @property string $lm_permission_number
 * @property string $lm_tool_description
 * @property string $lm_tool_status
 * @property string $lm_open_date
 * @property string $lm_open_hour
 * @property string $lm_open_operation
 * @property string $lm_open_maint
 * @property string $lm_open_k3
 * @property string $lm_close_date
 * @property string $lm_close_hour
 * @property string $lm_close_operation
 * @property string $lm_close_maint
 * @property string $lm_close_k3
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class LotoMonitoring extends AppModel
{
    public $lm_tool_status_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loto_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'lm_key_name', 'lm_permission_number'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['lm_tool_description'], 'string'],
            [['lm_open_date', 'lm_close_date'], 'safe'],
            [['lm_key_name', 'lm_permission_number', 'lm_open_operation', 'lm_open_maint', 'lm_open_k3', 'lm_close_operation', 'lm_close_maint', 'lm_close_k3'], 'string', 'max' => 50],
            [['lm_tool_status'], 'string', 'max' => 10],
            [['lm_open_hour', 'lm_close_hour'], 'string', 'max' => 5],
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
            'lm_key_name' => 'Nomor Kunci',
            'lm_permission_number' => 'Nomor Izin Kerja/ PTW',
            'lm_tool_description' => 'Deskripsi Peralatan/ Equipment',
            'lm_tool_status' => 'Status LOTO (Open/ Closed)',
            'lm_open_date' => AppLabels::DATE,
            'lm_open_hour' => AppLabels::HOUR,
            'lm_open_operation' => 'Bag. Operasi',
            'lm_open_maint' => 'Bag. Pemeliharaan',
            'lm_open_k3' => 'Bag. K3',
            'lm_close_date' => AppLabels::DATE,
            'lm_close_hour' => AppLabels::HOUR,
            'lm_close_operation' => 'Bag. Operasi',
            'lm_close_maint' => 'Bag. Pemeliharaan',
            'lm_close_k3' => 'Bag. K3',
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->lm_open_date == '') {
            $this->lm_open_date = Yii::$app->formatter->asDate($this->lm_open_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->lm_close_date == '') {
            $this->lm_close_date = Yii::$app->formatter->asDate($this->lm_close_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->lm_open_date == '') {
            $this->lm_open_date = Yii::$app->formatter->asDate($this->lm_open_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->lm_close_date == '') {
            $this->lm_close_date = Yii::$app->formatter->asDate($this->lm_close_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        $this->lm_tool_status_desc = Codeset::getCodesetValue(AppConstants::CODESET_LM_TOOL_STATUS, $this->lm_tool_status);

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
