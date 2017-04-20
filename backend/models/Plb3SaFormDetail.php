<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_sa_form_detail".
 *
 * @property integer $id
 * @property integer $plb3_sa_form_id
 * @property integer $plb3_sa_question_id
 * @property string $plb3safd_yes_no
 * @property integer $plb3safd_percentage
 * @property string $plb3safd_description
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3SaForm $plb3SaForm
 * @property Plb3SaQuestion $plb3SaQuestion
 * @property AttachmentOwner[] $attachmentOwners
 */
class Plb3SaFormDetail extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plb3_sa_form_detail';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plb3_sa_form_id', 'plb3_sa_question_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_sa_form_id', 'plb3_sa_question_id', 'plb3safd_percentage'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3safd_description'], 'string'],
            [['plb3safd_yes_no'], 'string', 'max' => 1],
            [['plb3_sa_form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3SaForm::className(), 'targetAttribute' => ['plb3_sa_form_id' => 'id']],
            [['plb3_sa_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3SaQuestion::className(), 'targetAttribute' => ['plb3_sa_question_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'plb3_sa_form_id' => sprintf('%s %s', AppLabels::SELF_ASSESSMENT_SHORT, AppLabels::PLB3),
            'plb3_sa_question_id' => AppLabels::QUESTION,
            'plb3safd_yes_no' => AppLabels::YES_NO,
            'plb3safd_percentage' => AppLabels::PERCENTAGE,
            'plb3safd_description' => AppLabels::DESCRIPTION,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaForm() {
        return $this->hasOne(Plb3SaForm::className(), ['id' => 'plb3_sa_form_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaQuestion() {
        return $this->hasOne(Plb3SaQuestion::className(), ['id' => 'plb3_sa_question_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PLB3_SA]);
    }
}
