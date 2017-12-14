<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "maturity_level_k3l_detail".
 *
 * @property integer $id
 * @property integer $maturity_level_k3l_id
 * @property integer $maturity_level_k3l_question_id
 * @property string $mld_target
 * @property string $mld_realization
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaturityLevelK3l $maturityLevelK3l
 * @property MaturityLevelK3lQuestion $maturityLevelK3lQuestion;
 * @property AttachmentOwner $attachmentOwner
 */
class MaturityLevelK3lDetail extends AppModel
{
    public $mld_target_display;
    public $mld_realization_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maturity_level_k3l_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maturity_level_k3l_id', 'maturity_level_k3l_question_id', 'mld_target', 'mld_realization'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['maturity_level_k3l_id', 'maturity_level_k3l_question_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['mld_target', 'mld_realization'], 'number'],
            [['maturity_level_k3l_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevelK3l::className(), 'targetAttribute' => ['maturity_level_k3l_id' => 'id']],
            [['maturity_level_k3l_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaturityLevelK3lQuestion::className(), 'targetAttribute' => ['maturity_level_k3l_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'maturity_level_k3l_id' => AppLabels::MATURITY_LEVEL_K3L,
            'maturity_level_k3l_question_id' => AppLabels::QUESTION,
            'mld_target' => AppLabels::TARGET,
            'mld_realization' => AppLabels::REALIZATION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->mld_target_display = $this->mld_target;
        $this->mld_realization_display = $this->mld_realization;

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityK3lLevel() {
        return $this->hasOne(MaturityLevelK3l::className(), ['id' => 'maturity_level_k3l_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelK3lQuestion() {
        return $this->hasOne(MaturityLevelK3lQuestion::className(), ['id' => 'maturity_level_k3l_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner() {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_MATURITY_LEVEL_K3L]);
    }
}
