<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppa_ba_report_bm".
 *
 * @property integer $id
 * @property integer $ppa_ba_monitoring_point_id
 * @property string $ppabar_param_code
 * @property string $ppabar_param_unit_code
 * @property string $ppabar_qs_1
 * @property string $ppabar_qs_2
 * @property string $ppabar_qs_unit_code
 * @property string $ppabar_qs_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaBaConcentration[] $ppaBaConcentrations
 * @property PpaBaMonitoringPoint $ppaBaMonitoringPoint
 */
class PpaBaReportBm extends AppModel {
    
    public $ppabar_param_code_desc;
    public $ppabar_param_unit_code_desc;
    public $ppabar_qs_1_display;
    public $ppabar_qs_2_display;
    public $ppabar_qs_unit_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_ba_report_bm';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_ba_monitoring_point_id', 'ppabar_param_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_ba_monitoring_point_id'], 'integer'],
            [['ppabar_qs_1', 'ppabar_qs_2'], 'number', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppabar_param_code', 'ppabar_param_unit_code', 'ppabar_qs_unit_code'], 'string', 'max' => 10],
            [['ppabar_qs_ref'], 'string', 'max' => 100],
            [['ppa_ba_monitoring_point_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaBaMonitoringPoint::className(), 'targetAttribute' => ['ppa_ba_monitoring_point_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_ba_monitoring_point_id' => AppLabels::MONITORING_POINT,
            'ppabar_param_code' => AppLabels::PARAM,
            'ppabar_param_unit_code' => AppLabels::UNIT,
            'ppabar_qs_1' => AppLabels::QS_CONCENTRATE,
            'ppabar_qs_2' => '',
            'ppabar_qs_1_display' => AppLabels::QS_CONCENTRATE,
            'ppabar_qs_2_display' => '',
            'ppabar_qs_unit_code' => AppLabels::QS_UNIT,
            'ppabar_qs_ref' => AppLabels::QS_REFERRED_RULE,
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
            
            $ppaBaReportBMId = $this->id;
            
            if (isset($request['PpaBaConcentration'])) {
                foreach ($request['PpaBaConcentration'] as $key => $ppaBaConcentration) {
                    if (isset($ppaBaConcentration['id'])) {
                        $ppaBaConcentrationMdl = PpaBaConcentration::findOne(['id' => $ppaBaConcentration['id']]);
                    } else {
                        $ppaBaConcentrationMdl = new PpaBaConcentration();
                        $ppaBaConcentrationMdl->ppa_ba_report_bm_id = $ppaBaReportBMId;
                    }
                    
                    if (!$ppaBaConcentrationMdl->load(['PpaBaConcentration' => $ppaBaConcentration]) || !$ppaBaConcentrationMdl->save()) {
                        $errors = array_merge($errors, $ppaBaConcentrationMdl->errors);
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
        
        $this->ppabar_qs_1_display = $this->ppabar_qs_1;
        $this->ppabar_qs_2_display = $this->ppabar_qs_2;
        $this->ppabar_param_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPA_RBM_PARAM_CODE, $this->ppabar_param_code);
        $this->ppabar_param_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPA_RBM_PARAM_UNIT_CODE, $this->ppabar_param_unit_code);
        $this->ppabar_qs_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_QS_UNIT_CODE, $this->ppabar_qs_unit_code);
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaConcentrations() {
        return $this->hasMany(PpaBaConcentration::className(), ['ppa_ba_report_bm_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaMonitoringPoint() {
        return $this->hasOne(PpaBaMonitoringPoint::className(), ['id' => 'ppa_ba_monitoring_point_id']);
    }
}
