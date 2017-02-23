<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppu_technical_provision".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppu $ppu
 * @property PpuTechnicalProvisionDetail[] $ppuTechnicalProvisionDetails
 */
class PpuTechnicalProvision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_technical_provision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id'], 'required'],
            [['ppu_id'], 'integer'],
            [['ppu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppu::className(), 'targetAttribute' => ['ppu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_id' => 'Ppu ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpu()
    {
        return $this->hasOne(Ppu::className(), ['id' => 'ppu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisionDetails()
    {
        return $this->hasMany(PpuTechnicalProvisionDetail::className(), ['ppu_technical_provision_id' => 'id']);
    }
}
