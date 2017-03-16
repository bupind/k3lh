<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppa_report_bm".
 *
 * @property integer $id
 * @property integer $ppa_setup_permit_id
 * @property string $ppar_param_code
 * @property string $ppar_param_unit_code
 * @property string $ppar_qs_1
 * @property string $ppar_qs_2
 * @property string $ppar_qs_unit_code
 * @property string $ppar_qs_ref
 * @property string $ppar_qs_max_pollution_load
 * @property string $ppar_qs_load_unit_code
 * @property string $ppar_qs_max_pollution_load_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaInletOutlet[] $ppaInletOutlets
 * @property PpaSetupPermit $ppaSetupPermit
 */
class PpaReportBm extends AppModel {
    
    public $ppar_qs_1_display;
    public $ppar_qs_2_display;
    public $ppar_qs_max_pollution_load_display;
    public $ppar_param_code_desc;
    public $ppar_param_unit_code_desc;
    public $ppar_qs_unit_code_desc;
    public $ppar_qs_load_unit_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_report_bm';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_setup_permit_id', 'ppar_param_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_setup_permit_id'], 'integer'],
            [['ppar_qs_1', 'ppar_qs_2', 'ppar_qs_max_pollution_load'], 'number', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppar_param_code', 'ppar_qs_unit_code', 'ppar_param_unit_code', 'ppar_qs_unit_code', 'ppar_qs_load_unit_code'], 'string', 'max' => 10],
            [['ppar_qs_ref', 'ppar_qs_max_pollution_load_ref'], 'string', 'max' => 100],
            [['ppa_setup_permit_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaSetupPermit::className(), 'targetAttribute' => ['ppa_setup_permit_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_setup_permit_id' => AppLabels::SETUP_POINT_PERMIT,
            'ppar_param_code' => AppLabels::PARAM,
            'ppar_param_unit_code' => AppLabels::UNIT,
            'ppar_qs_1' => AppLabels::QS_CONCENTRATE,
            'ppar_qs_2' => '',
            'ppar_qs_1_display' => AppLabels::QS_CONCENTRATE,
            'ppar_qs_2_display' => '',
            'ppar_qs_unit_code' => AppLabels::QS_UNIT,
            'ppar_qs_ref' => AppLabels::QS_REFERRED_RULE,
            'ppar_qs_max_pollution_load' => AppLabels::QS_MAX_POLLUTION_LOAD,
            'ppar_qs_max_pollution_load_display' => AppLabels::QS_MAX_POLLUTION_LOAD,
            'ppar_qs_load_unit_code' => AppLabels::QS_LOAD_UNIT_CODE,
            'ppar_qs_max_pollution_load_ref' => AppLabels::QS_REFERRED_MAX_POLLUTION_LOAD_RULE,
        ];
    }
    
    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];
        
        try {
            $this->load($request);
            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }
            
            $ppaReportBMId = $this->id;
            
            if (isset($request['PpaInletOutlet'])) {
                foreach ($request['PpaInletOutlet'] as $key => $ppaInletOutlet) {
                    if (isset($ppaInletOutlet['id'])) {
                        $ppaInletOutletMdl = PpaInletOutlet::findOne(['id' => $ppaInletOutlet['id']]);
                    } else {
                        $ppaInletOutletMdl = new PpaInletOutlet();
                        $ppaInletOutletMdl->ppa_report_bm_id = $ppaReportBMId;
                    }
                    
                    if (!$ppaInletOutletMdl->load(['PpaInletOutlet' => $ppaInletOutlet]) || !$ppaInletOutletMdl->save()) {
                        $errors = array_merge($errors, $ppaInletOutletMdl->errors);
                        throw new Exception();
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
    
    public function afterFind() {
        parent::afterFind();
        
        $this->ppar_qs_1_display = $this->ppar_qs_1;
        $this->ppar_qs_2_display = $this->ppar_qs_2;
        $this->ppar_param_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPA_RBM_PARAM_CODE, $this->ppar_param_code);
        $this->ppar_param_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPA_RBM_PARAM_UNIT_CODE, $this->ppar_param_unit_code);
        $this->ppar_qs_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_QS_UNIT_CODE, $this->ppar_qs_unit_code);
        $this->ppar_qs_load_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_QS_LOAD_UNIT_CODE, $this->ppar_qs_load_unit_code);
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaInletOutlets() {
        return $this->hasMany(PpaInletOutlet::className(), ['ppa_report_bm_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaSetupPermit() {
        return $this->hasOne(PpaSetupPermit::className(), ['id' => 'ppa_setup_permit_id']);
    }
}
