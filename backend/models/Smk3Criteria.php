<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk3_criteria".
 *
 * @property integer $id
 * @property integer $smk3_subtitle_id
 * @property integer $criteria_number
 * @property string $criteria
 * @property integer $answer
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Subtitle $smk3Subtitle
 */
class Smk3Criteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_criteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smk3_subtitle_id', 'criteria_number', 'criteria', 'answer', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['smk3_subtitle_id', 'criteria_number', 'answer', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['criteria'], 'string', 'max' => 1000],
            [['smk3_subtitle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3Subtitle::className(), 'targetAttribute' => ['smk3_subtitle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smk3_subtitle_id' => 'Smk3 Subtitle ID',
            'criteria_number' => 'Criteria Number',
            'criteria' => 'Criteria',
            'answer' => 'Answer',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Subtitle()
    {
        return $this->hasOne(Smk3Subtitle::className(), ['id' => 'smk3_subtitle_id']);
    }
}
