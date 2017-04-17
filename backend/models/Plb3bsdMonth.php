<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3bsd_month".
 *
 * @property integer $id
 * @property integer $plb3_balance_sheet_treatment_id
 * @property integer $plb3bsdm_month
 * @property integer $plb3bsdm_year
 * @property integer $plb3bsdm_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3BalanceSheetTreatment $plb3BalanceSheetTreatment
 */
class Plb3bsdMonth extends AppModel
{
    /**
     * @inheritdoc
     */
    public $plb3bsdm_value_display;


    public static function tableName()
    {
        return 'plb3bsd_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_balance_sheet_treatment_id', 'plb3bsdm_month', 'plb3bsdm_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_balance_sheet_treatment_id', 'plb3bsdm_month', 'plb3bsdm_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3bsdm_value'], 'number'],
            [['plb3_balance_sheet_treatment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3BalanceSheetTreatment::className(), 'targetAttribute' => ['plb3_balance_sheet_treatment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_balance_sheet_treatment_id' => AppLabels::TREATMENT,
            'plb3bsdm_month' => AppLabels::MONTH,
            'plb3bsdm_year' => AppLabels::YEAR,
            'plb3bsdm_generated' => AppLabels::GENERATED,
            'plb3bsdm_value_display' => AppLabels::GENERATED,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->plb3bsdm_value_display = $this->plb3bsdm_value;

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3BalanceSheetTreatment()
    {
        return $this->hasOne(Plb3BalanceSheetTreatment::className(), ['id' => 'plb3_balance_sheet_treatment_id']);
    }
}
