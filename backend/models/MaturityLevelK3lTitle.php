<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "maturity_level_k3l_title".
 *
 * @property integer $id
 * @property string $title_text
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaturityLevelK3lQuestion[] $maturityLevelK3lQuestions
 */
class MaturityLevelK3lTitle extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maturity_level_k3l_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_text'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['title_text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_text' => AppLabels::TITLE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelK3lQuestions()
    {
        return $this->hasMany(MaturityLevelK3lQuestion::className(), ['maturity_level_k3l_title_id' => 'id']);
    }
}
