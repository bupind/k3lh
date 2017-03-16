<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_question".
 *
 * @property integer $id
 * @property string $ppaq_question_type_code
 * @property string $ppaq_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class PpaQuestion extends AppModel {
    
    public $ppaq_question_type_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_question';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppaq_question_type_code', 'ppaq_question'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppaq_question'], 'string'],
            [['ppaq_question_type_code'], 'string', 'max' => 10],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppaq_question_type_code' => AppLabels::CATEGORY,
            'ppaq_question' => AppLabels::QUESTION,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->ppaq_question_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE, $this->ppaq_question_type_code);
        
        return true;
    }
    
}
