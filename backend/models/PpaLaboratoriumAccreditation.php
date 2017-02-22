<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ppa_laboratorium_accreditation".
 *
 * @property integer $id
 * @property integer $ppa_laboratorium_id
 * @property string $lacc_number
 * @property string $lacc_end_date
 * @property string $lacc_remark
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium $ppaLaboratorium
 */
class PpaLaboratoriumAccreditation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppa_laboratorium_accreditation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppa_laboratorium_id', 'lacc_number', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['ppa_laboratorium_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['lacc_end_date'], 'safe'],
            [['lacc_number'], 'string', 'max' => 50],
            [['lacc_remark'], 'string', 'max' => 255],
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
            'lacc_number' => 'Lacc Number',
            'lacc_end_date' => 'Lacc End Date',
            'lacc_remark' => 'Lacc Remark',
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
