<?php

namespace backend\models;

/**
 * This is the model class for table "ppa_month".
 *
 * @property integer $id
 * @property integer $ppa_setup_permit_id
 * @property integer $ppam_month
 * @property integer $ppam_date
 * @property string $ppam_cert_number
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaSetupPermit $ppaSetupPermit
 */
class PpaMonth extends \yii\db\ActiveRecord {
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
            [['ppa_setup_permit_id', 'ppam_month', 'ppam_date', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_setup_permit_id', 'ppam_month', 'ppam_date', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
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
            'ppa_setup_permit_id' => 'Ppa Setup Permit ID',
            'ppam_month' => 'Ppam Month',
            'ppam_date' => 'Ppam Date',
            'ppam_cert_number' => 'Ppam Cert Number',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaSetupPermit() {
        return $this->hasOne(PpaSetupPermit::className(), ['id' => 'ppa_setup_permit_id']);
    }
}
