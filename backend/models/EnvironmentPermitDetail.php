<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "environment_permit_detail".
 *
 * @property integer $id
 * @property integer $environment_permit_id
 * @property string $ep_document_name
 * @property string $ep_institution
 * @property string $ep_date
 * @property integer $ep_capacity_limit
 * @property integer $ep_realization_limit
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class EnvironmentPermitDetail extends \yii\db\ActiveRecord
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
            [['environment_permit_id', 'ep_document_name', 'ep_institution', 'ep_date', 'ep_capacity_limit', 'ep_realization_limit', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['environment_permit_id', 'ep_capacity_limit', 'ep_realization_limit', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ep_date'], 'safe'],
            [['ep_document_name', 'ep_institution'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'environment_permit_id' => 'Environment Permit ID',
            'ep_document_name' => 'Ep Document Name',
            'ep_institution' => 'Ep Institution',
            'ep_date' => 'Ep Date',
            'ep_capacity_limit' => 'Ep Capacity Limit',
            'ep_realization_limit' => 'Ep Realization Limit',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
