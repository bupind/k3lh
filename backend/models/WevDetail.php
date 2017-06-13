<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "wev_detail".
 *
 * @property integer $id
 * @property integer $working_env_data_id
 * @property string $wevd_parameter
 * @property string $wevd_unit_code
 * @property integer $wevd_qs
 * @property string $wevd_test_result
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkingEnvData $workingEnvData
 */
class WevDetail extends AppModel
{
    public $wevd_unit_code_desc;
    public $wevd_qs_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wev_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['working_env_data_id', 'wevd_parameter', 'wevd_unit_code', 'wevd_qs'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['working_env_data_id', 'wevd_qs'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['wevd_test_result'], 'string', 'max' => 255],
            [['wevd_parameter'], 'string', 'max' => 50],
            [['wevd_unit_code'], 'string', 'max' => 10],
            [['working_env_data_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingEnvData::className(), 'targetAttribute' => ['working_env_data_id' => 'id']],
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->wevd_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_WEDD_UNIT_CODE, $this->wevd_unit_code);
        $this->wevd_qs_display = $this->wevd_qs;
        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'working_env_data_id' => AppLabels::FORM_WORK_ENV_DATA,
            'wevd_parameter' => AppLabels::PARAMETER,
            'wevd_unit_code' => AppLabels::UNIT,
            'wevd_qs' => AppLabels::QUALITY_STANDARD,
            'wevd_test_result' => AppLabels::TEST_RESULT,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingEnvData()
    {
        return $this->hasOne(WorkingEnvData::className(), ['id' => 'working_env_data_id']);
    }
}
