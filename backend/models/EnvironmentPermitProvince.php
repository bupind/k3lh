<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "environment_permit_province".
 *
 * @property integer $id
 * @property integer $environment_permit_report_id
 * @property string $ep_province
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property EnvironmentPermitReport $environmentPermitReport
 * @property AttachmentOwner $attachmentOwner
 */
class EnvironmentPermitProvince extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['environment_permit_report_id', 'ep_province'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['environment_permit_report_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ep_province'], 'string', 'max' => 50],
            [['environment_permit_report_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnvironmentPermitReport::className(), 'targetAttribute' => ['environment_permit_report_id' => 'id']],
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'environment_permit_report_id' => AppLabels::REPORTING,
            'ep_province' => AppLabels::PROVINCE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermitReport()
    {
        return $this->hasOne(EnvironmentPermitReport::className(), ['id' => 'environment_permit_report_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_ENVIRONMENT_PERMIT_PROVINCE]);
    }
}
