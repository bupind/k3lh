<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
/**
 * This is the model class for table "skko_detail".
 *
 * @property integer $id
 * @property integer $skko_id
 * @property string $skko_number
 * @property string $skko_date
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Skko $skko
 * @property AttachmentOwner $attachmentOwner
 */
class SkkoDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skko_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skko_id', 'skko_number', 'skko_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['skko_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['skko_date'], 'safe'],
            [['skko_number'], 'string', 'max' => 100],
            [['skko_id'], 'exist', 'skipOnError' => true, 'targetClass' => Skko::className(), 'targetAttribute' => ['skko_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skko_id' => AppLabels::SKKO,
            'skko_number' => AppLabels::SKKO_NUMBER,
            'skko_date' => AppLabels::DATE,
        ];
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        $this->skko_date = \Yii::$app->formatter->asDate($this->skko_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }
    public function afterFind()
    {
        parent::afterFind();

        $this->skko_date = \Yii::$app->formatter->asDate($this->skko_date);

        return true;
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
    public function getSkko()
    {
        return $this->hasOne(Skko::className(), ['id' => 'skko_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_SKKO_DOCUMENT]);
    }
}
