<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "attachment_owner".
 *
 * @property integer $id
 * @property integer $attachment_id
 * @property string $atfo_module_code
 * @property integer $atfo_module_pk
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Attachment $attachment
 */
class AttachmentOwner extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'attachment_owner';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['attachment_id', 'atfo_module_code', 'atfo_module_pk'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['attachment_id', 'atfo_module_pk'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['atfo_module_code'], 'string', 'max' => 50],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'attachment_id' => AppLabels::ATTACHMENT,
            'atfo_module_code' => AppLabels::CODE,
            'atfo_module_pk' => AppLabels::DATA_ID,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment() {
        return $this->hasOne(Attachment::className(), ['id' => 'attachment_id']);
    }
}
