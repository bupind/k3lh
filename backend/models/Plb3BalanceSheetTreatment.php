<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_balance_sheet_treatment".
 *
 * @property integer $id
 * @property integer $plb3_balance_sheet_detail_id
 * @property string $plb3bst_treatment_type_code
 * @property string $plb3bst_ref
 * @property string $plb3bst_manifest_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3BalanceSheetDetail $plb3BalanceSheetDetail
 * @property Plb3bsdMonth[] $plb3bsdMonths
 */
class Plb3BalanceSheetTreatment extends AppModel
{
    /**
     * @inheritdoc
     */
    public $plb3bst_treatment_type_code_desc;

    public static function tableName()
    {
        return 'plb3_balance_sheet_treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_balance_sheet_detail_id', 'plb3bst_treatment_type_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_balance_sheet_detail_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3bst_treatment_type_code'], 'string', 'max' => 10],
            [['plb3bst_ref'], 'string', 'max' => 255],
            [['plb3bst_manifest_code'], 'string', 'max' => 50],
            [['plb3_balance_sheet_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3BalanceSheetDetail::className(), 'targetAttribute' => ['plb3_balance_sheet_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_balance_sheet_detail_id' => AppLabels::BALANCE_SHEET,
            'plb3bst_treatment_type_code' => AppLabels::TREATMENT,
            'plb3bst_ref' => AppLabels::DESCRIPTION,
            'plb3bst_manifest_code' => AppLabels::MANIFEST_CODE,
        ];
    }

    public function getTreatmentType($treatmentCode){
        return sprintf("PBTTC%s", $treatmentCode+1);
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function afterFind() {
        parent::afterFind();

        $this->plb3bst_treatment_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_TREATMENT_TYPE_CODE, $this->plb3bst_treatment_type_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3BalanceSheetDetail()
    {
        return $this->hasOne(Plb3BalanceSheetDetail::className(), ['id' => 'plb3_balance_sheet_detail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3bsdMonths()
    {
        return $this->hasMany(Plb3bsdMonth::className(), ['plb3_balance_sheet_treatment_id' => 'id']);
    }
}
