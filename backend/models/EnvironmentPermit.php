<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "environment_permit".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ep_year
 * @property string $ep_quarter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class EnvironmentPermit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ep_year', 'ep_quarter', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['sector_id', 'power_plant_id', 'ep_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ep_quarter'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => 'Sector ID',
            'power_plant_id' => 'Power Plant ID',
            'ep_year' => 'Ep Year',
            'ep_quarter' => 'Ep Quarter',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
