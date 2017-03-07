<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "ppu_technical_provision_detail".
 *
 * @property integer $id
 * @property integer $ppu_technical_provision_id
 * @property integer $ppu_question_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuTechnicalProvision $ppuTechnicalProvision
 * @property PpuQuestion $ppuQuestion
 * @property AttachmentOwner $attachmentOwner
 */
class PpuTechnicalProvisionDetail extends AppModel
{
    public $pputp_attachment_owner;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_technical_provision_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_technical_provision_id','ppu_question_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_technical_provision_id', 'ppu_question_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppu_technical_provision_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuTechnicalProvision::className(), 'targetAttribute' => ['ppu_technical_provision_id' => 'id']],
            [['ppu_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuQuestion::className(), 'targetAttribute' => ['ppu_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_technical_provision_id' => AppLabels::TECHNICAL_PROVISION,
            'ppu_question_id' => AppLabels::QUESTION,
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
    public function getPpuTechnicalProvision()
    {
        return $this->hasOne(PpuTechnicalProvision::className(), ['id' => 'ppu_technical_provision_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuQuestion()
    {
        return $this->hasOne(PpuQuestion::className(), ['id' => 'ppu_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPU_TECHNICAL_PROVISION]);
    }
}
