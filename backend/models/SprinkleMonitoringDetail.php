<?php

namespace backend\models;

use common\vendor\AppLabels;
use common\vendor\AppConstants;


/**
 * This is the model class for table "sprinkle_monitoring_detail".
 *
 * @property integer $id
 * @property integer $sprinkle_monitoring_id
 * @property string $sm_location
 * @property string $sm_sprinkle_head
 * @property string $sm_detector
 * @property string $sm_piping_condition
 * @property string $sm_notes
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property SprinkleMonitoring $sprinkleMonitoring
 */
class SprinkleMonitoringDetail extends AppModel
{
    public $sm_sprinkle_head_desc;
    public $sm_detector_desc;
    public $sm_piping_condition_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sprinkle_monitoring_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sprinkle_monitoring_id', 'sm_location'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sprinkle_monitoring_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['sm_notes'], 'string'],
            [['sm_location'], 'string', 'max' => 50],
            [['sm_sprinkle_head', 'sm_detector', 'sm_piping_condition'], 'string', 'max' => 10],
            [['sprinkle_monitoring_id'], 'exist', 'skipOnError' => true, 'targetClass' => SprinkleMonitoring::className(), 'targetAttribute' => ['sprinkle_monitoring_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sprinkle_monitoring_id' => AppLabels::FORM_SPRINKLE_MONITORING,
            'sm_location' => AppLabels::LOCATION,
            'sm_sprinkle_head' => 'Head Sprinkle',
            'sm_detector' => 'Fisik Detector',
            'sm_piping_condition' => 'Kondisi Piping',
            'sm_notes' => 'Catatan Hasil Pengecekan',
        ];
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function afterFind() {
        parent::afterFind();

        $this->sm_sprinkle_head_desc = Codeset::getCodesetValue(AppConstants::CODESET_SM_SPRINKLE_HEAD, $this->sm_sprinkle_head);
        $this->sm_detector_desc = Codeset::getCodesetValue(AppConstants::CODESET_SM_DETECTOR, $this->sm_detector);
        $this->sm_piping_condition_desc = Codeset::getCodesetValue(AppConstants::CODESET_SM_PIPING_CONDITION, $this->sm_piping_condition);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSprinkleMonitoring()
    {
        return $this->hasOne(SprinkleMonitoring::className(), ['id' => 'sprinkle_monitoring_id']);
    }
}
