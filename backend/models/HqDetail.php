<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "hq_detail".
 *
 * @property integer $id
 * @property integer $housekeeping_question_detail_id
 * @property string $hqd_subtitle
 * @property string $hqd_criteria_1
 * @property string $hqd_criteria_2
 * @property string $hqd_criteria_3
 * @property string $hqd_criteria_4
 * @property string $hqd_criteria_5
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HousekeepingQuestion $housekeepingQuestionDetail
 * @property HiDetail[] $hiDetails
 */
class HqDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hq_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['housekeeping_question_detail_id', 'hqd_subtitle'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['housekeeping_question_detail_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['hqd_criteria_1', 'hqd_criteria_2', 'hqd_criteria_3', 'hqd_criteria_4', 'hqd_criteria_5'], 'string'],
            [['hqd_subtitle'], 'string', 'max' => 150],
            [['housekeeping_question_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => HousekeepingQuestion::className(), 'targetAttribute' => ['housekeeping_question_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'housekeeping_question_detail_id' => AppLabels::FORM_HOUSEKEEPING_QUESTION,
            'hqd_subtitle' => AppLabels::SUBTITLE,
            'hqd_criteria_1' => AppLabels::HQ_CRITERIA_1,
            'hqd_criteria_2' => AppLabels::HQ_CRITERIA_2,
            'hqd_criteria_3' => AppLabels::HQ_CRITERIA_3,
            'hqd_criteria_4' => AppLabels::HQ_CRITERIA_4,
            'hqd_criteria_5' => AppLabels::HQ_CRITERIA_5,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHousekeepingQuestionDetail()
    {
        return $this->hasOne(HousekeepingQuestion::className(), ['id' => 'housekeeping_question_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiDetails()
    {
        return $this->hasMany(HiDetail::className(), ['hq_detail_id' => 'id']);
    }
}
