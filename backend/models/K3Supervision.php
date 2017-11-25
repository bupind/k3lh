<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "k3_supervision".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $ks_name
 * @property string $ks_permission_number
 * @property string $ks_operator
 * @property string $ks_duration_time
 * @property string $ks_start_date
 * @property string $ks_end_date
 * @property string $ks_contr_number
 * @property string $ks_fo_name
 * @property string $ks_fo_phone
 * @property string $ks_supervisor
 * @property string $ks_sheet_creator
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property K3SupervisionDetail[] $k3SupervisionDetails
 */
class K3Supervision extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'k3_supervision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ks_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ks_start_date', 'ks_end_date'], 'safe'],
            [['ks_supervisor'], 'string'],
            [['ks_name', 'ks_permission_number', 'ks_operator', 'ks_duration_time', 'ks_contr_number', 'ks_fo_name', 'ks_fo_phone', 'ks_sheet_creator'], 'string', 'max' => 50],
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
            'ks_name' => AppLabels::WORK_NAME,
            'ks_permission_number' => sprintf("%s %s", AppLabels::NUMBER,AppLabels::WORKING_PERMIT),
            'ks_operator' => 'Pelaksana Pekerjaan',
            'ks_duration_time' => AppLabels::WORK_DURATION,
            'ks_start_date' => 'Mulai',
            'ks_end_date' => 'Selesai',
            'ks_contr_number' => 'Nomor Kontrak',
            'ks_fo_name' => AppLabels::NAME,
            'ks_fo_phone' => 'No. Telpon',
            'ks_supervisor' => 'Pengawas K3',
            'ks_sheet_creator' => 'Pengawas K3',
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->ks_start_date == '') {
            $this->ks_start_date = Yii::$app->formatter->asDate($this->ks_start_date, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->ks_end_date == '') {
            $this->ks_end_date = Yii::$app->formatter->asDate($this->ks_end_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->ks_start_date == '') {
            $this->ks_start_date = Yii::$app->formatter->asDate($this->ks_start_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->ks_end_date == '') {
            $this->ks_end_date = Yii::$app->formatter->asDate($this->ks_end_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK3SupervisionDetails()
    {
        return $this->hasMany(K3SupervisionDetail::className(), ['k3_supervision_id' => 'id']);
    }
}
