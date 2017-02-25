<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppu_question".
 *
 * @property integer $id
 * @property string $ppuq_question_type_code
 * @property string $ppuq_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuTechnicalProvisionDetail[] $ppuTechnicalProvisionDetails
 */
class PpuQuestion extends AppModel
{
    public $ppuq_question_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppuq_question'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppuq_question_type_code'], 'string', 'max' => 10],
            [['ppuq_question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppuq_question_type_code' => AppLabels::CATEGORY,
            'ppuq_question' => AppLabels::QUESTION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->ppuq_question_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPU_QUESTION_TYPE_CODE, $this->ppuq_question_type_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisionDetails()
    {
        return $this->hasMany(PpuTechnicalProvisionDetail::className(), ['ppu_question_id' => 'id']);
    }
}
