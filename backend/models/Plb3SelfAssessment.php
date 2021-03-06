<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/**
 * This is the model class for table "plb3_self_assessment".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $plb3_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3SaCompanyProfile $plb3SaCompanyProfile
 * @property Sector $sector
 * @property PowerPlant $powerPlant
 * @property Plb3SaForm $plb3SaForm
 */
class Plb3SelfAssessment extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plb3_self_assessment';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'power_plant_id', 'plb3_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'plb3_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'plb3_year' => AppLabels::YEAR,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaCompanyProfile() {
        return $this->hasOne(Plb3SaCompanyProfile::className(), ['plb3_self_assessment_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaForm() {
        return $this->hasOne(Plb3SaForm::className(), ['plb3_self_assessment_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant() {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
    
    public function getSummary() {
        return sprintf('%s - %s - %s', $this->sector->sector_name, $this->powerPlant->pp_name, $this->plb3_year);
    }
}
