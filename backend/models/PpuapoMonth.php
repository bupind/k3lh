<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppuapo_month".
 *
 * @property integer $id
 * @property integer $ppua_parameter_obligation_id
 * @property integer $ppuapom_month
 * @property integer $ppuapom_year
 * @property string $ppuapom_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuaParameterObligation $ppuaParameterObligation
 */
class PpuapoMonth extends AppModel
{
    public $ppuapom_value_display;
    public $month_label;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppuapo_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppua_parameter_obligation_id', 'ppuapom_month', 'ppuapom_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppua_parameter_obligation_id', 'ppuapom_month', 'ppuapom_year'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppuapom_value'], 'number'],
            [['ppua_parameter_obligation_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuaParameterObligation::className(), 'targetAttribute' => ['ppua_parameter_obligation_id' => 'id']],
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $dt = new \DateTime();
        $dt->setDate($this->ppuapom_year, $this->ppuapom_month, 1);
        $this->month_label = $dt->format('M Y');
        $this->ppuapom_value_display = $this->ppuapom_value;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppua_parameter_obligation_id' => AppLabels::PARAMETER_OBLIGATION,
            'ppuapom_month' => AppLabels::MONTH,
            'ppuapom_year' => AppLabels::YEAR,
            'ppuapom_value' => AppLabels::VALUE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuaParameterObligation()
    {
        return $this->hasOne(PpuaParameterObligation::className(), ['id' => 'ppua_parameter_obligation_id']);
    }
}
