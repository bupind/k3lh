<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_technical_provision_detail".
 *
 * @property integer $id
 * @property integer $ppa_technical_provision_id
 * @property integer $ppa_question_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaQuestion $ppaQuestion
 * @property PpaTechnicalProvision $ppaTechnicalProvision
 * @property AttachmentOwner[] $attachmentOwners
 */
class PpaTechnicalProvisionDetail extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_technical_provision_detail';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_technical_provision_id', 'ppa_question_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_technical_provision_id', 'ppa_question_id'], 'integer'],
            [['ppa_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaQuestion::className(), 'targetAttribute' => ['ppa_question_id' => 'id']],
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
            'ppa_question_id' => AppLabels::QUESTION,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaQuestion() {
        return $this->hasOne(PpaQuestion::className(), ['id' => 'ppa_question_id']);
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
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPA_TECH_PROVISION]);
    }
}
