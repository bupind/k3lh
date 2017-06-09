<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "slo_tools".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $st_form_month_type_code
 * @property integer $st_year
 * @property string $st_generator_unit
 * @property string $st_generator_location
 * @property string $st_generator_status
 * @property string $st_category
 * @property string $st_type
 * @property string $st_location
 * @property string $st_validation_number
 * @property string $st_published
 * @property string $st_check1
 * @property string $st_check2
 * @property string $st_next_check
 * @property string $st_certificate_publisher
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Sector $sector
 * @property PowerPlant $powerPlant
 */
class SloTools extends AppModel
{
    public $st_generator_status_code_desc;
    public $st_category_desc;
    public $st_form_month_type_code_desc;
    public $st_next_check_desc;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slo_tools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_year', 'st_form_month_type_code', 'sector_id', 'power_plant_id', 'st_generator_unit', 'st_generator_location', 'st_generator_status', 'st_category'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id' ,'st_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['st_published', 'st_check1', 'st_check2'], 'safe'],
            [['st_generator_unit', 'st_generator_location', 'st_type', 'st_validation_number', 'st_certificate_publisher'], 'string', 'max' => 100],
            [['st_generator_status', 'st_category', 'st_next_check', 'st_form_month_type_code'], 'string', 'max' => 10],
            [['st_location'], 'string', 'max' => 50],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
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
            'st_generator_unit' => AppLabels::SG_GENERATOR_UNIT,
            'st_generator_location' => AppLabels::ST_LOCATION,
            'st_generator_status' => AppLabels::SG_GENERATOR_STATUS,
            'st_category' => AppLabels::ST_CATEGORY,
            'st_type' => AppLabels::ST_TYPE,
            'st_location' => AppLabels::LOCATION,
            'st_validation_number' => AppLabels::ST_VALIDATION,
            'st_published' => AppLabels::PUBLISHED,
            'st_check1' => AppLabels::ST_CHECK1,
            'st_check2' => AppLabels::ST_CHECK2,
            'st_next_check' => AppLabels::ST_NEXT_CHECK,
            'st_certificate_publisher' => AppLabels::ST_CERTIFICATE_PUBLISHER,
            'st_form_month_type_code' => AppLabels::MONTH,
            'st_year' => AppLabels::YEAR,
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->st_published == '') {
            $this->st_published = Yii::$app->formatter->asDate($this->st_published, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->st_check1 == '') {
            $this->st_check1 = Yii::$app->formatter->asDate($this->st_check1, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->st_check2 == '') {
            $this->st_check2 = Yii::$app->formatter->asDate($this->st_check2, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->st_published == '') {
            $this->st_published = Yii::$app->formatter->asDate($this->st_published, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->st_check1 == '') {
            $this->st_check1 = Yii::$app->formatter->asDate($this->st_check1, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->st_check2 == '') {
            $this->st_check2 = Yii::$app->formatter->asDate($this->st_check2, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        $this->st_generator_status_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOT_GEN_STATUS_CODE, $this->st_generator_status);
        $this->st_next_check_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOT_NEXT_CHECK_CODE, $this->st_next_check);
        $this->st_category_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOT_CATEGORY_CODE, $this->st_category);
        $this->st_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->st_form_month_type_code);

        return true;
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
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
}
