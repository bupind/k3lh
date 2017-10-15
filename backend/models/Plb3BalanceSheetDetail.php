<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;


/**
 * This is the model class for table "plb3_balance_sheet_detail".
 *
 * @property integer $id
 * @property string $form_type_code
 * @property integer $plb3_balance_sheet_id
 * @property string $plb3_waste_type
 * @property string $plb3_waste_source_code
 * @property string $plb3_waste_unit_code
 * @property string $plb3_previous_waste
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3BalanceSheet $plb3BalanceSheet
 * @property Plb3BalanceSheetTreatment[] $plb3BalanceSheetTreatments
 */
class Plb3BalanceSheetDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public $plb3_waste_source_code_desc;
    public $plb3_waste_unit_code_desc;
    public $plb3_previous_waste_display;

    public $tps_saved_value;

    public static function tableName()
    {
        return 'plb3_balance_sheet_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_type_code', 'plb3_balance_sheet_id', 'plb3_waste_type', 'plb3_waste_source_code', 'plb3_waste_unit_code', 'plb3_previous_waste'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_balance_sheet_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3_previous_waste'], 'number'],
            [['form_type_code', 'plb3_waste_source_code', 'plb3_waste_unit_code'], 'string', 'max' => 10],
            [['plb3_waste_type'], 'string', 'max' => 100],
            [['plb3_balance_sheet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3BalanceSheet::className(), 'targetAttribute' => ['plb3_balance_sheet_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_type_code' => AppLabels::FORM_TYPE,
            'plb3_balance_sheet_id' => AppLabels::BALANCE_SHEET,
            'plb3_waste_type' => AppLabels::WASTE_TYPE,
            'plb3_waste_source_code' => AppLabels::WASTE_SOURCE,
            'plb3_waste_unit_code' => AppLabels::WASTE_UNIT,
            'plb3_previous_waste' => AppLabels::PREVIOUS_WASTE,
            'plb3_previous_waste_display' => AppLabels::PREVIOUS_WASTE,
        ];
    }

    public function saveTransactional()
    {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);
            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $plb3BalanceSheetDetailId = $this->id;

            if (isset($request['Plb3BalanceSheetTreatment'])) {
                foreach ($request['Plb3BalanceSheetTreatment'] as $keyBST => $plb3Treatment) {
                    if (isset($plb3Treatment['id'])) {
                        $plb3TreatmentTuple = Plb3BalanceSheetTreatment::findOne(['id' => $plb3Treatment['id']]);

                    } else {
                        $plb3TreatmentTuple = new Plb3BalanceSheetTreatment();
                        $plb3TreatmentTuple->plb3_balance_sheet_detail_id = $plb3BalanceSheetDetailId;
                    }
                    if (!$plb3TreatmentTuple->load(['Plb3BalanceSheetTreatment' => $plb3Treatment]) || !$plb3TreatmentTuple->save()) {
                        $errors = array_merge($errors, $plb3TreatmentTuple->errors);
                        throw new Exception();
                    }

                    if (isset($request['Plb3bsdMonth'])) {
                        if ($keyBST != 1) {
                            foreach ($request['Plb3bsdMonth'][$keyBST] as $keyM => $plb3Month) {
                                if (isset($plb3Month['id'])) {
                                    $plb3MonthTuple = Plb3bsdMonth::findOne(['id' => $plb3Month['id']]);
                                } else {
                                    $plb3MonthTuple = new Plb3bsdMonth();
                                    $plb3MonthTuple->plb3_balance_sheet_treatment_id = $plb3TreatmentTuple->id;
                                }

                                if (!$plb3MonthTuple->load(['Plb3bsdMonth' => $plb3Month]) || !$plb3MonthTuple->save()) {

                                    $errors = array_merge($errors, $plb3MonthTuple->errors);
                                    throw new Exception();
                                }
                            }
                        }
                    }
                }
            }


            $transaction->commit();
            return TRUE;
        } catch (Exception $ex) {
            $transaction->rollBack();
            $this->afterFind();

            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }

            return FALSE;
        }
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->plb3_previous_waste_display = $this->plb3_previous_waste;
        $this->plb3_waste_source_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_WASTE_TYPE_CODE, $this->plb3_waste_source_code);
        $this->plb3_waste_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_BS_WASTE_UNIT_CODE, $this->plb3_waste_unit_code);


        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3BalanceSheet()
    {
        return $this->hasOne(Plb3BalanceSheet::className(), ['id' => 'plb3_balance_sheet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3BalanceSheetTreatments()
    {
        return $this->hasMany(Plb3BalanceSheetTreatment::className(), ['plb3_balance_sheet_detail_id' => 'id']);
    }
}
