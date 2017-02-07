<?php

namespace backend\models;

use Yii;
use yii\db\Command;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $smk3_year
 * @property integer $smk3_semester
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property Smk3Detail[] $smk3Details
 */
class Smk3 extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'smk3_year', 'smk3_semester'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'smk3_year', 'smk3_semester'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
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
            'smk3_year' => AppLabels::YEAR,
            'smk3_semester' => AppLabels::SEMESTER,
        ];
    }

    public function getAllTitles(){
        $sql = "SELECT * FROM smk3_title";
        $command = Yii::$app->db->createCommand($sql);
        $results = $command->queryAll();

        return $results;
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
    public function getSmk3Answers()
    {
        return $this->hasMany(Smk3Detail::className(), ['smk3_id' => 'id']);
    }
}
