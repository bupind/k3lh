<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "p2k3_monitoring_detail".
 *
 * @property integer $id
 * @property integer $p2k3_monitoring_id
 * @property string $pmd_finding
 * @property string $pmd_action
 * @property string $pmd_deadline
 * @property string $pmd_status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property P3kMonitoring $p2k3Monitoring
 */
class P2k3MonitoringDetail extends AppModel
{
    public $pmd_status_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p2k3_monitoring_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p2k3_monitoring_id', 'pmd_finding'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['p2k3_monitoring_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['pmd_action'], 'string'],
            [['pmd_deadline'], 'safe'],
            [['pmd_finding'], 'string', 'max' => 50],
            [['pmd_status'], 'string', 'max' => 10],
            [['p2k3_monitoring_id'], 'exist', 'skipOnError' => true, 'targetClass' => P3kMonitoring::className(), 'targetAttribute' => ['p2k3_monitoring_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p2k3_monitoring_id' => AppLabels::FORM_P2K3_MONITORING,
            'pmd_finding' => AppLabels::FINDING,
            'pmd_action' => AppLabels::ACTION,
            'pmd_deadline' => 'Deadline Penyelesaian',
            'pmd_status' => 'Status',
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->pmd_deadline == '') {
            $this->pmd_deadline = Yii::$app->formatter->asDate($this->pmd_deadline, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->pmd_deadline == '') {
            $this->pmd_deadline = Yii::$app->formatter->asDate($this->pmd_deadline, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        $this->pmd_status_desc = Codeset::getCodesetValue(AppConstants::COCESET_P2K3M_STATUS, $this->pmd_status);

        return true;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP2k3Monitoring()
    {
        return $this->hasOne(P3kMonitoring::className(), ['id' => 'p2k3_monitoring_id']);
    }
}
