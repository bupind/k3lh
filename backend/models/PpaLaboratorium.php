<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_laboratorium".
 *
 * @property integer $id
 * @property integer $ppa_technical_provision_id
 * @property string $labor_name
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaTechnicalProvision $ppaTechnicalProvision
 * @property PpaLaboratoriumAccreditation[] $ppaLaboratoriumAccreditations
 * @property PpaLaboratoriumTest[] $ppaLaboratoriumTests
 */
class PpaLaboratorium extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_laboratorium';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_technical_provision_id', 'labor_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_technical_provision_id'], 'integer'],
            [['labor_name'], 'string', 'max' => 255],
            [['ppa_technical_provision_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaTechnicalProvision::className(), 'targetAttribute' => ['ppa_technical_provision_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_technical_provision_id' => AppLabels::TECHNICAL_PROVISION,
            'labor_name' => AppLabels::NAME,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaTechnicalProvision() {
        return $this->hasOne(PpaTechnicalProvision::className(), ['id' => 'ppa_technical_provision_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratoriumAccreditations() {
        return $this->hasMany(PpaLaboratoriumAccreditation::className(), ['ppa_laboratorium_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratoriumTests() {
        return $this->hasMany(PpaLaboratoriumTest::className(), ['ppa_laboratorium_id' => 'id']);
    }
}
