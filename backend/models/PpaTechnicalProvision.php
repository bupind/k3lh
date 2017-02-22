<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppa_technical_provision".
 *
 * @property integer $id
 * @property integer $ppa_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium[] $ppaLaboratoria
 * @property Ppa $ppa
 * @property PpaTechnicalProvisionDetail[] $ppaTechnicalProvisionDetails
 */
class PpaTechnicalProvision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppa_technical_provision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppa::className(), 'targetAttribute' => ['ppa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppa_id' => 'Ppa ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratoria()
    {
        return $this->hasMany(PpaLaboratorium::className(), ['ppa_technical_provision_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpa()
    {
        return $this->hasOne(Ppa::className(), ['id' => 'ppa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaTechnicalProvisionDetails()
    {
        return $this->hasMany(PpaTechnicalProvisionDetail::className(), ['ppa_technical_provision_id' => 'id']);
    }
}
