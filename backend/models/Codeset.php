<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "codeset".
 *
 * @property integer $id
 * @property string $cset_name
 * @property string $cset_code
 * @property string $cset_value
 * @property string $cset_description
 * @property string $cset_parent_pk
 * @property string $created_date
 * @property string $updated_date
 * @property integer $created_by
 * @property integer $updated_by
 */
class Codeset extends AppModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'codeset';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cset_name', 'cset_code', 'cset_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['cset_description'], 'string'],
            [['cset_order'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['cset_name'], 'string', 'max' => 50],
            [['cset_code', 'cset_parent_pk'], 'string', 'max' => 15],
            [['cset_value'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cset_name' => AppLabels::NAME,
            'cset_code' => AppLabels::CODE,
            'cset_value' => AppLabels::VALUE,
            'cset_description' => AppLabels::DESCRIPTION,
            'cset_parent_pk' => sprintf('%s %s', AppLabels::CODE, AppLabels::PARENT),
            'cset_order' => AppLabels::ORDER,
        ];
    }
    
    public static function getCodesetObject($csetName, $csetCode) {
        return Codeset::findOne(['cset_name' => $csetName, 'cset_code' => $csetCode]);
    }
    
    public static function getCodesetValue($csetName, $csetCode) {
        $code = Codeset::findOne(['cset_name' => $csetName, 'cset_code' => $csetCode]);
        return !is_null($code) && !empty($code) ? $code->cset_value : '';
    }
    
    public static function getCodesetAll($csetName, $first = false, $extract = false, $options = []) {
        $limit = $first === true ? 1 : null;
        $where = ['cset_name' => $csetName];
        $columns = ['cset_order' => SORT_ASC, 'id' => SORT_ASC];
        
        $codeset = Codeset::find()->where($where)->orderBy($columns)->limit($limit);
        
        if (isset($options['andFilterWhere'])) {
            foreach ($options['andFilterWhere'] as $filterCondition) {
                $codeset->andFilterWhere($filterCondition);
            }
        }
        
        $results = $codeset->all();
        
        if ($extract) {
            $temp = [];
            foreach ($results as $model) {
                $temp[$model->cset_code] = $model->cset_value;
            }
            $results = $temp;
        }
        
        return $results;
    }
        
    public static function customMap($csetName, $optionLabel = 'cset_value', $options = []) {
    
        $data = Codeset::find()->where(['cset_name' => $csetName])->orderBy(['cset_order' => SORT_ASC, $optionLabel => SORT_ASC]);
    
        if (isset($options['where'])) {
            foreach ($options['where'] as $where) {
                $data->where($where);
            }
        }
    
        if (isset($options['andWhere'])) {
            foreach ($options['andWhere'] as $andWhere) {
                $data->andWhere($andWhere);
            }
        }
        
        if (isset($options['filter'])) {
            foreach ($options['filter'] as $filter) {
                $data->andFilterWhere($filter);
            }
        }
        
        $map = ArrayHelper::map($data->all(), 'cset_code', $optionLabel);
        if (empty($map)) {
            Yii::$app->session->setFlash('danger', AppConstants::MSG_EMPTY_PLEASE_ADD);
        }
    
        if (!isset($options['empty']) || $options['empty'] == true) {
            $map = ArrayHelper::merge(['' => AppLabels::PLEASE_SELECT], $map);
        }
        
        return $map;
    }
    
    public static function generateInvoiceNumber($csetCode) {
        $csetValue = Codeset::getCodesetValue(AppConstants::CODESET_NAME_INVOICE_NUMBER, $csetCode);
        $lastNumber = !empty($csetValue) ? self::getInvoiceLastNumber($csetValue, $csetCode) : 0;
        
        $invoiceNumber = \Yii::t('app', AppConstants::INVOICE_FORMAT, ['module' => $csetCode, 'date' => date('Y/m'), 'number' => str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT)]);
        
        return $invoiceNumber;
    }
    
    public static function incrementInvoiceNumber($csetCode) {        
        $cset = Codeset::getCodesetObject(AppConstants::CODESET_NAME_INVOICE_NUMBER, $csetCode);
                
        $lastNumber = !empty($cset->cset_value) ? self::getInvoiceLastNumber($cset->cset_value, $csetCode) : 0;
        $lastNumber += 1;
                
        $cset->cset_value = $lastNumber;
        
        if ($cset->save()) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public static function objectByInvoiceNumber($invoiceNo) {
        list($csetCode, $year, $month, $incrementNo) = explode('/', $invoiceNo);
        
        $model = $field = null;
        
        switch ($csetCode) {
            case AppConstants::INVOICE_NUMBER_INITIAL_INVENTORY:
                $model = new InitialInventory();
                $field = 'invt_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE:
                $model = new Purchase();
                $field = 'pcs_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE:
                $model = new Sale();
                $field = 'sale_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_COST:
                $model = new Cost();
                $field = 'cost_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PAYMENT:
                $model = new Payment();
                $field = 'payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE_PAYMENT:
                $model = new SalePayment();
                $field = 'sale_payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DOWN_PAYMENT:
                $model = new DownPayment();
                $field = 'dp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_DOWN_PAYMENT:
                $model = new PurchaseDownPayment();
                $field = 'dp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_FINANCE_PAYMENT:
                $model = new FinancePayment();
                $field = 'fin_payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_DOWN_PAYMENT_RECEIVED:
                $model = new PurchaseDownPaymentReceived();
                $field = 'dpr_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DOWN_PAYMENT_CASHBACK:
                $model = new DownPaymentCashback();
                $field = 'dpc_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DEPOSIT_DISBURSEMENT:
                $model = new DepositDisbursement();
                $field = 'dd_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DEPOSIT_DISBURSEMENT_PAYMENT:
                $model = new DepositDisbursementPayment();
                $field = 'ddp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_GENERAL_LEDGER:
                $model = new GeneralLedger();
                $field = 'gl_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_COMMISSION_PAYMENT:
                $model = new PurchaseCommissionPayment();
                $field = 'pcp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE_COMMISSION_PAYMENT:
                $model = new SaleCommissionPayment();
                $field = 'scp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SPECIAL_JOURNAL:
                $model = new SpecialJournal();
                $field = 'sj_invoice_no';
                break;
        }
        
        $obj = $model->find()->where([$field => $invoiceNo])->one();
        
        return $obj;
    }
    
    public static function validateMasterPassword($rawPassword) {
        $masterPasswords = Codeset::getCodesetAll(AppConstants::CODESET_NAME_MASTER_PASSWORD, false, true);        
        $match = [];
        
        foreach ($masterPasswords as $masterPassword) {
            $match[] = Yii::$app->security->validatePassword($rawPassword, $masterPassword);
        }

        if (in_array(true, $match)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    private static function getInvoiceLastNumber($csetValue, $csetCode) {
        $model = $field = null;
        
        switch ($csetCode) {
            case AppConstants::INVOICE_NUMBER_INITIAL_INVENTORY:
                $model = new InitialInventory();
                $field = 'invt_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE:
                $model = new Purchase();
                $field = 'pcs_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE:
                $model = new Sale();
                $field = 'sale_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_COST:
                $model = new Cost();
                $field = 'cost_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PAYMENT:
                $model = new Payment();
                $field = 'payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE_PAYMENT:
                $model = new SalePayment();
                $field = 'sale_payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DOWN_PAYMENT:
                $model = new DownPayment();
                $field = 'dp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_DOWN_PAYMENT:
                $model = new PurchaseDownPayment();
                $field = 'dp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_FINANCE_PAYMENT:
                $model = new FinancePayment();
                $field = 'fin_payment_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_DOWN_PAYMENT_RECEIVED:
                $model = new PurchaseDownPaymentReceived();
                $field = 'dpr_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DOWN_PAYMENT_CASHBACK:
                $model = new DownPaymentCashback();
                $field = 'dpc_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DEPOSIT_DISBURSEMENT:
                $model = new DepositDisbursement();
                $field = 'dd_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_DEPOSIT_DISBURSEMENT_PAYMENT:
                $model = new DepositDisbursementPayment();
                $field = 'ddp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_GENERAL_LEDGER:
                $model = new GeneralLedger();
                $field = 'gl_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_PURCHASE_COMMISSION_PAYMENT:
                $model = new PurchaseCommissionPayment();
                $field = 'pcp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SALE_COMMISSION_PAYMENT:
                $model = new SaleCommissionPayment();
                $field = 'scp_invoice_no';
                break;
            case AppConstants::INVOICE_NUMBER_SPECIAL_JOURNAL:
                $model = new SpecialJournal();
                $field = 'sj_invoice_no';
                break;
        }
        
        $lastRecord = $model->find()->select($field)->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $lastRecordArray = explode('/', $lastRecord[$field]);
        
        if (!empty($lastRecord) && (int)date('m') != (int)$lastRecordArray[2]) {
            return 0;
        }
        
        return $csetValue;
    }

}
