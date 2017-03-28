<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppa_ba_monitoring_point".
 *
 * @property integer $id
 * @property integer $ppa_ba_id
 * @property string $ppabamp_wastewater_source
 * @property string $ppabamp_monitoring_point_name
 * @property string $ppabamp_coord_lat
 * @property string $ppabamp_coord_long
 * @property string $ppabamp_document_name
 * @property string $ppabamp_permit_publisher
 * @property string $ppabamp_validation_date
 * @property string $ppabamp_monitoring_frequency_code
 * @property string $ppabamp_monitoring_status_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaBa $ppaBa
 * @property PpaBaMonth[] $ppaBaMonths
 * @property PpaBaReportBm[] $ppaBaReportBms
 * @property PpaBaReportBm[] $ppaBaReportBmsNoFooterParams
 * @property PpaBaReportBm $ppaBaReportBmDebit
 * @property PpaBaReportBm $ppaBaReportBmProduction
 */
class PpaBaMonitoringPoint extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_ba_monitoring_point';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_ba_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_ba_id'], 'integer'],
            [['ppabamp_validation_date'], 'safe'],
            [['ppabamp_validation_date'], 'date', 'format' => AppConstants::FORMAT_DATE_PHP, 'message' => AppConstants::VALIDATE_DATE],
            [['ppabamp_wastewater_source', 'ppabamp_monitoring_point_name', 'ppabamp_document_name', 'ppabamp_permit_publisher'], 'string', 'max' => 150],
            [['ppabamp_coord_lat', 'ppabamp_coord_long'], 'string', 'max' => 50],
            [['ppabamp_monitoring_frequency_code', 'ppabamp_monitoring_status_code'], 'string', 'max' => 10],
            [['ppa_ba_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaBa::className(), 'targetAttribute' => ['ppa_ba_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_ba_id' => AppLabels::PPA_BA,
            'ppabamp_wastewater_source' => AppLabels::WASTE_WATER_SOURCE,
            'ppabamp_monitoring_point_name' => AppLabels::MONITORING_POINT_NAME,
            'ppabamp_coord_lat' => AppLabels::LATITUDE,
            'ppabamp_coord_long' => AppLabels::LONGITUDE,
            'ppabamp_document_name' => AppLabels::ENVIRONMENT_DOCUMENT_NAME,
            'ppabamp_permit_publisher' => AppLabels::ENVIRONMENT_DOCUMENT_VALIDATOR,
            'ppabamp_validation_date' => AppLabels::VALIDATE_DATE,
            'ppabamp_monitoring_frequency_code' => AppLabels::MONITORING_FREQUENCY,
            'ppabamp_monitoring_status_code' => AppLabels::MONITORING_STATUS_PERIOD,
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
            
            $ppaBaMonitoringPointId = $this->id;
            
            if (isset($request['PpaBaMonth'])) {
                foreach ($request['PpaBaMonth'] as $key => $ppaBaMonth) {
                    if (isset($ppaBaMonth['id'])) {
                        $ppaBaMonthMdl = PpaBaMonth::findOne(['id' => $ppaBaMonth['id']]);
                    } else {
                        $ppaBaMonthMdl = new PpaBaMonth();
                        $ppaBaMonthMdl->ppa_ba_monitoring_point_id = $ppaBaMonitoringPointId;
                    }
                    
                    if (!$ppaBaMonthMdl->load(['PpaBaMonth' => $ppaBaMonth]) || !$ppaBaMonthMdl->save()) {
                        $errors = array_merge($errors, $ppaBaMonthMdl->errors);
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
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        $this->ppabamp_validation_date = Yii::$app->formatter->asDate($this->ppabamp_validation_date, AppConstants::FORMAT_DB_DATE_PHP);
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->ppabamp_validation_date = Yii::$app->formatter->asDate($this->ppabamp_validation_date, AppConstants::FORMAT_DATE_PHP);
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBa() {
        return $this->hasOne(PpaBa::className(), ['id' => 'ppa_ba_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaMonths() {
        return $this->hasMany(PpaBaMonth::className(), ['ppa_ba_monitoring_point_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaReportBms() {
        return $this->hasMany(PpaBaReportBm::className(), ['ppa_ba_monitoring_point_id' => 'id']);
    }
    
    public function getPpaBaReportBmsNoFooterParams() {
        return $this->hasMany(PpaBaReportBm::className(), ['ppa_ba_monitoring_point_id' => 'id'])
            ->andOnCondition("ppabar_param_code != '" . AppConstants::PPA_RBM_PARAM_DEBIT . "'")
            ->andOnCondition("ppabar_param_code != '" . AppConstants::PPA_RBM_PARAM_PRODUCTION . "'");
    }
    
    public function getPpaBaReportBmDebit() {
        return $this->hasOne(PpaBaReportBm::className(), ['ppa_ba_monitoring_point_id' => 'id'])->andWhere(['ppabar_param_code' => AppConstants::PPA_RBM_PARAM_DEBIT]);
    }
    
    public function getPpaBaReportBmProduction() {
        return $this->hasOne(PpaBaReportBm::className(), ['ppa_ba_monitoring_point_id' => 'id'])->andWhere(['ppabar_param_code' => AppConstants::PPA_RBM_PARAM_PRODUCTION]);
    }
}
