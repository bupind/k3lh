<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "bop_detail".
 *
 * @property integer $id
 * @property integer $beyond_obedience_program_id
 * @property string $bopd_program
 * @property integer $bopd_result
 * @property string $bopd_unit_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BeyondObedienceProgram $beyondObedienceProgram
 */
class BopDetail extends AppModel
{
    public $bopd_unit_code_desc;
    public $bopd_result_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bop_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['beyond_obedience_program_id', 'bopd_program', 'bopd_result'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['beyond_obedience_program_id', 'bopd_result'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['bopd_program'], 'string', 'max' => 255],
            [['bopd_unit_code'], 'string', 'max' => 10],
            [['beyond_obedience_program_id'], 'exist', 'skipOnError' => true, 'targetClass' => BeyondObedienceProgram::className(), 'targetAttribute' => ['beyond_obedience_program_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'beyond_obedience_program_id' => sprintf("%s %s", AppLabels::PROGRAM,AppLabels::BEYOND_OBEDIENCE),
            'bopd_program' => AppLabels::PROGRAM,
            'bopd_result' => AppLabels::RESULT,
            'bopd_unit_code' => AppLabels::UNIT,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->bopd_result_display = $this->bopd_result;
        $this->bopd_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_BOP_UNIT_CODE, $this->bopd_unit_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeyondObedienceProgram()
    {
        return $this->hasOne(BeyondObedienceProgram::className(), ['id' => 'beyond_obedience_program_id']);
    }
}
