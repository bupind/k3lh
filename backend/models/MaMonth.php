<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ma_month".
 *
 * @property integer $id
 * @property integer $monitoring_apar_id
 * @property string $mam_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MonitoringApar $monitoringApar
 */
class MaMonth extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ma_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monitoring_apar_id', 'mam_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['monitoring_apar_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['mam_value'], 'string', 'max' => 10],
            [['monitoring_apar_id'], 'exist', 'skipOnError' => true, 'targetClass' => MonitoringApar::className(), 'targetAttribute' => ['monitoring_apar_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monitoring_apar_id' => AppLabels::FORM_MONITORING_APAR,
            'mam_value' => AppLabels::VALUE,
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonitoringApar()
    {
        return $this->hasOne(MonitoringApar::className(), ['id' => 'monitoring_apar_id']);
    }
}
