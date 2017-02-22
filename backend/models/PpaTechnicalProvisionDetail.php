<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppa_technical_provision_detail".
 *
 * @property integer $id
 * @property integer $ppa_technical_provision_id
 * @property integer $ppa_question_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaQuestion $ppaQuestion
 * @property PpaTechnicalProvision $ppaTechnicalProvision
 */
class PpaTechnicalProvisionDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppa_technical_provision_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppa_technical_provision_id', 'ppa_question_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_technical_provision_id', 'ppa_question_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppa_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaQuestion::className(), 'targetAttribute' => ['ppa_question_id' => 'id']],
            [['ppa_technical_provision_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaTechnicalProvision::className(), 'targetAttribute' => ['ppa_technical_provision_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppa_technical_provision_id' => 'Ppa Technical Provision ID',
            'ppa_question_id' => 'Ppa Question ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaQuestion()
    {
        return $this->hasOne(PpaQuestion::className(), ['id' => 'ppa_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaTechnicalProvision()
    {
        return $this->hasOne(PpaTechnicalProvision::className(), ['id' => 'ppa_technical_provision_id']);
    }
}
