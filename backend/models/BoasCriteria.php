<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;


/**
 * This is the model class for table "boas_criteria".
 *
 * @property integer $id
 * @property integer $bo_assessment_aspect_id
 * @property string $boas_description
 * @property string $boas_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BoAssessment[] $boAssessments
 * @property BoAssessmentAspect $boAssessmentAspect
 */
class BoasCriteria extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boas_criteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bo_assessment_aspect_id', 'boas_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['bo_assessment_aspect_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['boas_value'], 'number'],
            [['boas_description'], 'string'],
            [['bo_assessment_aspect_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoAssessmentAspect::className(), 'targetAttribute' => ['bo_assessment_aspect_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bo_assessment_aspect_id' => AppLabels::ASSESSMENT_ASPECT,
            'boas_description' => sprintf("Deskripsi %s", AppLabels::CRITERIA),
            'boas_value' =>  sprintf("%s %s", AppLabels::VALUE, AppLabels::CRITERIA),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getBoAssessments()
    {
        return $this->hasMany(BoAssessment::className(), ['boas_criteria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoAssessmentAspect()
    {
        return $this->hasOne(BoAssessmentAspect::className(), ['id' => 'bo_assessment_aspect_id']);
    }
}
