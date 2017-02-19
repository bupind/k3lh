<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_month".
 *
 * @property integer $id
 * @property integer $ppa_setup_permit_id
 * @property integer $ppam_month
 * @property integer $ppam_year
 * @property string $ppam_cert_number
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaSetupPermit $ppaSetupPermit
 */
class PpaMonth extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_month';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_setup_permit_id', 'ppam_month', 'ppam_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_setup_permit_id', 'ppam_month', 'ppam_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppam_cert_number'], 'string', 'max' => 4],
            [['ppa_setup_permit_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaSetupPermit::className(), 'targetAttribute' => ['ppa_setup_permit_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_setup_permit_id' => AppLabels::SETUP_POINT_PERMIT,
            'ppam_month' => AppLabels::MONTH,
            'ppam_year' => AppLabels::YEAR,
            'ppam_cert_number' => AppLabels::CERTIFIED_NUMBER,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaSetupPermit() {
        return $this->hasOne(PpaSetupPermit::className(), ['id' => 'ppa_setup_permit_id']);
    }
}
