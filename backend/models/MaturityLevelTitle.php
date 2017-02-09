<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "maturity_level_title".
 *
 * @property integer $id
 * @property string $title_text
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaturityLevelQuestion[] $maturityLevelQuestions
 */
class MaturityLevelTitle extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'maturity_level_title';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title_text'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['title_text'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title_text' => AppLabels::TITLE,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelQuestions() {
        return $this->hasMany(MaturityLevelQuestion::className(), ['maturity_level_title_id' => 'id']);
    }
}
