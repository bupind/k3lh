<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_question".
 *
 * @property integer $id
 * @property string $plb3_form_type_code
 * @property string $plb3_question_type_code
 * @property string $plb3_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Plb3Question extends AppModel
{
    public $plb3_question_type_code_desc;
    public $plb3_form_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plb3_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_form_type_code', 'plb3_question_type_code', 'plb3_question'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_form_type_code', 'plb3_question_type_code'], 'string', 'max' => 10],
            [['plb3_question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_form_type_code' => AppLabels::FORM_TYPE,
            'plb3_question_type_code' => AppLabels::CATEGORY,
            'plb3_question' => AppLabels::QUESTION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->plb3_form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE, $this->plb3_form_type_code);
        $this->plb3_question_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_QUESTION_TYPE_CODE, $this->plb3_question_type_code);

        return true;
    }
}
