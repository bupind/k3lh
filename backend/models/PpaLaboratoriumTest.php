<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppa_laboratorium_test".
 *
 * @property integer $id
 * @property integer $ppa_laboratorium_id
 * @property integer $test_month
 * @property integer $test_year
 * @property integer $test_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium $ppaLaboratorium
 */
class PpaLaboratoriumTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppa_laboratorium_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppa_laboratorium_id', 'test_month', 'test_year', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_laboratorium_id', 'test_month', 'test_year', 'test_value', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppa_laboratorium_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaLaboratorium::className(), 'targetAttribute' => ['ppa_laboratorium_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppa_laboratorium_id' => 'Ppa Laboratorium ID',
            'test_month' => 'Test Month',
            'test_year' => 'Test Year',
            'test_value' => 'Test Value',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratorium()
    {
        return $this->hasOne(PpaLaboratorium::className(), ['id' => 'ppa_laboratorium_id']);
    }
}
