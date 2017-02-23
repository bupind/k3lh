<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppu_question".
 *
 * @property integer $id
 * @property string $ppuq_question_type_code
 * @property string $ppuq_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuTechnicalProvisionDetail[] $ppuTechnicalProvisionDetails
 */
class PpuQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppuq_question_type_code', 'ppuq_question'], 'required'],
            [['ppuq_question_type_code'], 'string', 'max' => 10],
            [['ppuq_question'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppuq_question_type_code' => 'Ppuq Question Type Code',
            'ppuq_question' => 'Ppuq Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisionDetails()
    {
        return $this->hasMany(PpuTechnicalProvisionDetail::className(), ['ppu_question_id' => 'id']);
    }
}
