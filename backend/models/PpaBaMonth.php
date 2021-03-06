<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_ba_month".
 *
 * @property integer $id
 * @property integer $ppa_ba_monitoring_point_id
 * @property integer $ppabam_month
 * @property integer $ppabam_year
 * @property string $ppabam_cert_number
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaBaMonitoringPoint $ppaBaMonitoringPoint
 * @property AttachmentOwner $attachmentOwner
 */
class PpaBaMonth extends AppModel {
    
    public $month_label;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_ba_month';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_ba_monitoring_point_id', 'ppabam_month', 'ppabam_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_ba_monitoring_point_id', 'ppabam_month', 'ppabam_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppabam_cert_number'], 'string', 'max' => 4],
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
            'ppabam_month' => AppLabels::MONTH,
            'ppabam_year' => AppLabels::YEAR,
            'ppabam_cert_number' => AppLabels::CERTIFIED_NUMBER,
        ];
    }
    
    public function afterFind() {
        parent::afterFind(); // TODO: Change the autogenerated stub
        
        $dt = new \DateTime();
        $dt->setDate($this->ppabam_year, $this->ppabam_month, 1);
        $this->month_label = $dt->format('M Y');
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaBaMonitoringPoint() {
        return $this->hasOne(PpaBaMonitoringPoint::className(), ['id' => 'ppa_ba_monitoring_point_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner() {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPA_BA_MONITORING_POINT_CERT_NUMB]);
    }
}
