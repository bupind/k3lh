<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3_title".
 *
 * @property integer $id
 * @property string $sttl_title
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Subtitle[] $smk3Subtitles
 */
class Smk3Title extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'sttl_title'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sttl_title'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sttl_title' => AppLabels::SMK3_TITLE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Subtitles()
    {
        return $this->hasMany(Smk3Subtitle::className(), ['smk3_title_id' => 'id']);
    }
}
