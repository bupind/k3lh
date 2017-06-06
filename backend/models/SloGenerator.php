<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "slo_generator".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $generator_unit
 * @property string $power_installed
 * @property integer $sg_year
 * @property string $generator_status
 * @property string $sg_number
 * @property string $sg_published
 * @property string $sg_end
 * @property string $sg_max_extension
 * @property string $sg_publisher
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class SloGenerator extends AppModel
{
    public $power_installed_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slo_generator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'generator_unit', 'power_installed', 'sg_year', 'generator_status'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'sg_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['power_installed'], 'number'],
            [['sg_published', 'sg_end', 'sg_max_extension'], 'safe'],
            [['generator_unit', 'sg_number', 'sg_publisher'], 'string', 'max' => 100],
            [['generator_status'], 'string', 'max' => 10],
            [['sg_year'], 'string', 'max' => 4],
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
            'generator_unit' => AppLabels::SG_GENERATOR_UNIT,
            'power_installed' => AppLabels::SG_POWER_INSTALLED,
            'power_installed_display' => AppLabels::SG_POWER_INSTALLED,
            'sg_year' => sprintf("%s %s", AppLabels::YEAR, AppLabels::OPERATION),
            'generator_status' => AppLabels::SG_GENERATOR_STATUS,
            'sg_number' => AppLabels::SG_SLO_NUMBER,
            'sg_published' => AppLabels::PUBLISHED,
            'sg_end' => AppLabels::SG_END,
            'sg_max_extension' => AppLabels::SG_MAX_EXTENSION,
            'sg_publisher' => AppLabels::PUBLISHER,
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        $this->sg_published = Yii::$app->formatter->asDate($this->sg_published, AppConstants::FORMAT_DB_DATE_PHP);
        $this->sg_end = Yii::$app->formatter->asDate($this->sg_end, AppConstants::FORMAT_DB_DATE_PHP);
        $this->sg_max_extension = Yii::$app->formatter->asDate($this->sg_max_extension, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        $this->sg_published = Yii::$app->formatter->asDate($this->sg_published, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        $this->sg_end = Yii::$app->formatter->asDate($this->sg_end, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        $this->sg_max_extension = Yii::$app->formatter->asDate($this->sg_max_extension, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        $this->power_installed_display = $this->power_installed;

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
