<?php

namespace backend\models;

use Yii;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "environment_permit_detail".
 *
 * @property integer $id
 * @property integer $environment_permit_id
 * @property string $ep_document_name
 * @property string $ep_institution
 * @property string $ep_date
 * @property integer $ep_limit_capacity
 * @property integer $ep_realization_capacity
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property EnvironmentPermit $environmentPermit
 */
class EnvironmentPermitDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['environment_permit_id', 'ep_document_name', 'ep_institution', 'ep_date', 'ep_limit_capacity', 'ep_realization_capacity'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['environment_permit_id', 'ep_limit_capacity', 'ep_realization_capacity'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ep_date'], 'safe'],
            [['ep_document_name', 'ep_institution'], 'string', 'max' => 1000],
            [['environment_permit_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnvironmentPermit::className(), 'targetAttribute' => ['environment_permit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'environment_permit_id' => AppLabels::ENVIRONMENT_PERMIT,
            'ep_document_name' => AppLabels::DOCUMENT_NAME,
            'ep_institution' => AppLabels::INSTITUTION,
            'ep_date' => AppLabels::DATE,
            'ep_limit_capacity' => AppLabels::CAPACITY_LIMIT,
            'ep_realization_capacity' => AppLabels::CAPACITY_REALIZATION,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermit()
    {
        return $this->hasOne(EnvironmentPermit::className(), ['id' => 'environment_permit_id']);
    }
}