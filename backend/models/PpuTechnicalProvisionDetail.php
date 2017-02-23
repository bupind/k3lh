<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppu_technical_provision_detail".
 *
 * @property integer $id
 * @property integer $ppu_technical_provision_id
 * @property integer $ppu_question_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuTechnicalProvision $ppuTechnicalProvision
 * @property PpuQuestion $ppuQuestion
 */
class PpuTechnicalProvisionDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_technical_provision_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_technical_provision_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppu_technical_provision_id', 'ppu_question_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppu_technical_provision_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuTechnicalProvision::className(), 'targetAttribute' => ['ppu_technical_provision_id' => 'id']],
            [['ppu_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuQuestion::className(), 'targetAttribute' => ['ppu_question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_technical_provision_id' => 'Ppu Technical Provision ID',
            'ppu_question_id' => 'Ppu Question ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvision()
    {
        return $this->hasOne(PpuTechnicalProvision::className(), ['id' => 'ppu_technical_provision_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuQuestion()
    {
        return $this->hasOne(PpuQuestion::className(), ['id' => 'ppu_question_id']);
    }
}
