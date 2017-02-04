<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3_criteria".
 *
 * @property integer $id
 * @property integer $smk3_subtitle_id
 * @property string $sctr_criteria
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Detail[] $smk3Details
 * @property Smk3Subtitle $smk3Subtitle
 */
class Smk3Criteria extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_criteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smk3_subtitle_id', 'sctr_criteria'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['smk3_subtitle_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['sctr_criteria'], 'string', 'max' => 1000],
            [['smk3_subtitle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3Subtitle::className(), 'targetAttribute' => ['smk3_subtitle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smk3_subtitle_id' => AppLabels::SMK3_SUBTITLE,
            'sctr_criteria' => AppLabels::CRITERIA,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Answers()
    {
        return $this->hasMany(Smk3Detail::className(), ['smk3_criteria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Subtitle()
    {
        return $this->hasOne(Smk3Subtitle::className(), ['id' => 'smk3_subtitle_id']);
    }
}
