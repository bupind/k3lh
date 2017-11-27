<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;

/**
 * This is the model class for table "pmd_month".
 *
 * @property integer $id
 * @property integer $p3k_monitoring_detail_id
 * @property integer $pmdm_month
 * @property string $pmdm_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property P3kMonitoringDetail $p3kMonitoringDetail
 */
class PmdMonth extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pmd_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p3k_monitoring_detail_id', 'pmdm_month'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['p3k_monitoring_detail_id', 'pmdm_month'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['pmdm_value'], 'string', 'max' => 50],
            [['p3k_monitoring_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => P3kMonitoringDetail::className(), 'targetAttribute' => ['p3k_monitoring_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p3k_monitoring_detail_id' => AppLabels::FORM_P3K_MONITORING,
            'pmdm_month' => AppLabels::MONTH,
            'pmdm_value' => AppLabels::VALUE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP3kMonitoringDetail()
    {
        return $this->hasOne(P3kMonitoringDetail::className(), ['id' => 'p3k_monitoring_detail_id']);
    }
}
