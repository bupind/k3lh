<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_sa_form_detail_static_quarter".
 *
 * @property integer $id
 * @property integer $plb3_sa_form_id
 * @property integer $plb3safdsq_quarter
 * @property string $plb3safdsq_ans_1
 * @property string $plb3safdsq_ans_2
 * @property string $plb3safdsq_ans_3
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3SaForm $plb3SaForm
 * @property AttachmentOwner[] $attachmentOwners
 */
class Plb3SaFormDetailStaticQuarter extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plb3_sa_form_detail_static_quarter';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plb3_sa_form_id', 'plb3safdsq_quarter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_sa_form_id', 'plb3safdsq_quarter'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3safdsq_ans_1', 'plb3safdsq_ans_2', 'plb3safdsq_ans_3'], 'string', 'max' => 1],
            [['plb3_sa_form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3SaForm::className(), 'targetAttribute' => ['plb3_sa_form_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'plb3_sa_form_id' => AppLabels::SELF_ASSESSMENT_SHORT,
            'plb3safdsq_quarter' => AppLabels::QUARTER,
            'plb3safdsq_ans_1' => AppLabels::PLB3_STATIC_QUESTION_QUARTER_1,
            'plb3safdsq_ans_2' => AppLabels::PLB3_STATIC_QUESTION_QUARTER_2,
            'plb3safdsq_ans_3' => AppLabels::PLB3_STATIC_QUESTION_QUARTER_3,
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
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PLB3_SA_STATIC_QUARTERLY]);
    }
}
