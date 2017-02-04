<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3_subtitle".
 *
 * @property integer $id
 * @property integer $smk3_title_id
 * @property integer $subtitle_number
 * @property string $subtitle
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Criteria[] $smk3Criterias
 * @property Smk3Title $smk3Title
 */
class Smk3Subtitle extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_subtitle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smk3_title_id', 'subtitle_number', 'subtitle'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['smk3_title_id', 'subtitle_number'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['subtitle'], 'string', 'max' => 1000],
            [['smk3_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3Title::className(), 'targetAttribute' => ['smk3_title_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smk3_title_id' => AppLabels::SMK3_TITLE,
            'subtitle_number' => AppLabels::SMK3_NUMBER_SUBTITLE,
            'subtitle' => AppLabels::SMK3_SUBTITLE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Criterias()
    {
        return $this->hasMany(Smk3Criteria::className(), ['smk3_subtitle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Title()
    {
        return $this->hasOne(Smk3Title::className(), ['id' => 'smk3_title_id']);
    }
}
