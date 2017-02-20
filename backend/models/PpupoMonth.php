<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "ppupo_month".
 *
 * @property integer $id
 * @property integer $ppu_parameter_obligation_id
 * @property integer $ppupom_month
 * @property integer $ppupom_year
 * @property string $ppupom_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuParameterObligation $ppuParameterObligation
 */
class PpupoMonth extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppupo_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_parameter_obligation_id', 'ppupom_month', 'ppupom_year', 'ppupom_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_parameter_obligation_id', 'ppupom_month', 'ppupom_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppupom_value'], 'number'],
            [['ppu_parameter_obligation_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuParameterObligation::className(), 'targetAttribute' => ['ppu_parameter_obligation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_parameter_obligation_id' => AppLabels::PARAMETER_OBLIGATION,
            'ppupom_month' => AppLabels::MONTH,
            'ppupom_year' => AppLabels::YEAR,
            'ppupom_value' => AppLabels::VALUE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuParameterObligation()
    {
        return $this->hasOne(PpuParameterObligation::className(), ['id' => 'ppu_parameter_obligation_id']);
    }
}
