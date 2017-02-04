<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3_detail".
 *
 * @property integer $id
 * @property integer $smk3_id
 * @property integer $smk3_criteria_id
 * @property integer $sdtl_answer
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3 $smk3
 * @property Smk3Criteria $criteria
 */
class Smk3Detail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smk3_id', 'smk3_criteria_id', 'sdtl_answer'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['smk3_id', 'smk3_criteria_id', 'sdtl_answer'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['smk3_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3::className(), 'targetAttribute' => ['smk3_id' => 'id']],
            [['smk3_criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3Criteria::className(), 'targetAttribute' => ['smk3_criteria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smk3_id' => AppLabels::SMK3,
            'smk3_criteria_id' => AppLabels::CRITERIA,
            'sdtl_answer' => AppLabels::ANSWER,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3()
    {
        return $this->hasOne(Smk3::className(), ['id' => 'smk3_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteria()
    {
        return $this->hasOne(Smk3Criteria::className(), ['id' => 'smk3_criteria_id']);
    }
}
