<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "hi_detail".
 *
 * @property integer $id
 * @property integer $housekeeping_implementation_id
 * @property integer $hq_detail_id
 * @property integer $hi_criteria_value
 * @property integer $hi_quality_value
 * @property string $hi_recommendation
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HousekeepingImplementation $housekeepingImplementation
 * @property HqDetail $hqDetail
 */
class HiDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hi_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['housekeeping_implementation_id', 'hq_detail_id', 'hi_criteria_value', 'hi_quality_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['housekeeping_implementation_id', 'hq_detail_id', 'hi_criteria_value', 'hi_quality_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['hi_recommendation'], 'string'],
            [['hi_criteria_value'], 'string', 'max' => 1],
            [['hi_quality_value'], 'string', 'max' => 3],
            [['housekeeping_implementation_id'], 'exist', 'skipOnError' => true, 'targetClass' => HousekeepingImplementation::className(), 'targetAttribute' => ['housekeeping_implementation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'housekeeping_implementation_id' => AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION,
            'hq_detail_id' => AppLabels::DETAIL,
            'hi_criteria_value' => AppLabels::CRITERIA,
            'hi_quality_value' => AppLabels::QUALITY,
            'hi_recommendation' => AppLabels::RECOMMENDATION,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHousekeepingImplementation()
    {
        return $this->hasOne(HousekeepingImplementation::className(), ['id' => 'housekeeping_implementation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHqDetail()
    {
        return $this->hasOne(HqDetail::className(), ['id' => 'hq_detail_id']);
    }
}
