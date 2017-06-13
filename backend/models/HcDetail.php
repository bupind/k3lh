<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "hc_detail".
 *
 * @property integer $id
 * @property integer $hydrant_checklist_id
 * @property integer $hydrant_question_id
 * @property integer $hcd_answer
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HydrantChecklist $hydrantChecklist
 * @property HydrantQuestion $hydrantQuestion
 */
class HcDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hc_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hydrant_checklist_id', 'hydrant_question_id', 'hcd_answer'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hydrant_checklist_id', 'hydrant_question_id', 'hcd_answer'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['hydrant_checklist_id'], 'exist', 'skipOnError' => true, 'targetClass' => HydrantChecklist::className(), 'targetAttribute' => ['hydrant_checklist_id' => 'id']],
            [['hydrant_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => HydrantQuestion::className(), 'targetAttribute' => ['hydrant_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hydrant_checklist_id' => AppLabels::HYDRANT,
            'hydrant_question_id' => AppLabels::ITEM,
            'hcd_answer' => AppLabels::ANSWER,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHydrantChecklist()
    {
        return $this->hasOne(HydrantChecklist::className(), ['id' => 'hydrant_checklist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHydrantQuestion()
    {
        return $this->hasOne(HydrantQuestion::className(), ['id' => 'hydrant_question_id']);
    }
}
