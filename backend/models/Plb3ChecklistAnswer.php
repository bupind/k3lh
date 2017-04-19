<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_checklist_answer".
 *
 * @property integer $id
 * @property integer $plb3_checklist_detail_id
 * @property integer $plb3_question_id
 * @property integer $plb3ca_answer
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3ChecklistDetail $plb3ChecklistDetail
 * @property Plb3Question $plb3Question
 * @property AttachmentOwner $attachmentOwner
 */
class Plb3ChecklistAnswer extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plb3_checklist_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_checklist_detail_id', 'plb3_question_id', 'plb3ca_answer'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_checklist_detail_id', 'plb3_question_id', 'plb3ca_answer'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3_checklist_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3ChecklistDetail::className(), 'targetAttribute' => ['plb3_checklist_detail_id' => 'id']],
            [['plb3_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3Question::className(), 'targetAttribute' => ['plb3_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_checklist_detail_id' => AppLabels::CHECKLIST,
            'plb3_question_id' => AppLabels::QUESTION,
            'plb3ca_answer' => AppLabels::ANSWER,
        ];
    }

    public function beforeDelete()
    {
        $attachment = $this->attachmentOwner;
        if(!is_null($attachment)){
            $attachment = $attachment->attachment;
        }
        if(!is_null($attachment)){
            $attachment->delete();
        }
        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3ChecklistDetail()
    {
        return $this->hasOne(Plb3ChecklistDetail::className(), ['id' => 'plb3_checklist_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3Question()
    {
        return $this->hasOne(Plb3Question::className(), ['id' => 'plb3_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PLB3_CHECKLIST]);
    }
}
