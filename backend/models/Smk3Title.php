<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "smk3_title".
 *
 * @property integer $id
 * @property integer $smk3_id
 * @property integer $title_number
 * @property string $title
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Subtitle[] $smk3Subtitles
 * @property Smk3 $smk3
 */
class Smk3Title extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smk3_id', 'title_number', 'title', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['smk3_id', 'title_number', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 1000],
            [['smk3_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smk3::className(), 'targetAttribute' => ['smk3_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smk3_id' => 'Smk3 ID',
            'title_number' => 'Title Number',
            'title' => 'Title',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Subtitles()
    {
        return $this->hasMany(Smk3Subtitle::className(), ['smk3_title_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3()
    {
        return $this->hasOne(Smk3::className(), ['id' => 'smk3_id']);
    }
}
