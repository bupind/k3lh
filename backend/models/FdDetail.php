<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "fd_detail".
 *
 * @property integer $id
 * @property integer $fire_detector_id
 * @property string $fdd_monthly_test_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property FireDetector $fireDetector
 */
class FdDetail extends AppModel
{
    public $fdd_monthly_test_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fire_detector_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['fire_detector_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['fdd_monthly_test_code'], 'string', 'max' => 10],
            [['fire_detector_id'], 'exist', 'skipOnError' => true, 'targetClass' => FireDetector::className(), 'targetAttribute' => ['fire_detector_id' => 'id']],
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->fdd_monthly_test_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FDD_TEST_RESULT, $this->fdd_monthly_test_code);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fire_detector_id' => AppLabels::FORM_FIRE_DETECTOR,
            'fdd_monthly_test_code' => AppLabels::MONTH,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFireDetector()
    {
        return $this->hasOne(FireDetector::className(), ['id' => 'fire_detector_id']);
    }
}
