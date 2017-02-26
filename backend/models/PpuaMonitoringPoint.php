<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppua_monitoring_point".
 *
 * @property integer $id
 * @property integer $ppu_ambient_id
 * @property string $ppua_monitoring_location
 * @property string $ppua_code_location
 * @property string $ppua_coord_latitude
 * @property string $ppua_coord_longitude
 * @property string $ppua_env_doc_name
 * @property string $ppua_institution
 * @property string $ppua_confirm_date
 * @property string $ppua_freq_monitoring_obligation_code
 * @property string $ppua_monitoring_data_status_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuAmbient $ppuAmbient
 */
class PpuaMonitoringPoint extends AppModel
{
    public $ppua_freq_monitoring_obligation_code_desc;
    public $ppua_monitoring_data_status_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppua_monitoring_point';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_ambient_id', 'ppua_monitoring_location', 'ppua_code_location', 'ppua_coord_latitude', 'ppua_coord_longitude', 'ppua_env_doc_name', 'ppua_institution', 'ppua_confirm_date', 'ppua_freq_monitoring_obligation_code', 'ppua_monitoring_data_status_code'], 'required', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppu_ambient_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppua_confirm_date'], 'safe'],
            [['ppua_monitoring_location', 'ppua_code_location', 'ppua_env_doc_name', 'ppua_institution'], 'string', 'max' => 100],
            [['ppua_coord_latitude', 'ppua_coord_longitude'], 'string', 'max' => 20],
            [['ppua_freq_monitoring_obligation_code', 'ppua_monitoring_data_status_code'], 'string', 'max' => 10],
            [['ppu_ambient_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuAmbient::className(), 'targetAttribute' => ['ppu_ambient_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_ambient_id' => sprintf("%s %s", AppLabels::PPU, AppLabels::AMBIENT),
            'ppua_monitoring_location' => sprintf("%s %s", AppLabels::LOCATION, AppLabels::MONITORING),
            'ppua_code_location' => sprintf("%s %s", AppLabels::CODE, AppLabels::LOCATION),
            'ppua_coord_latitude' => AppLabels::LATITUDE,
            'ppua_coord_longitude' => AppLabels::LONGITUDE,
            'ppua_env_doc_name' => sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT),
            'ppua_institution' => AppLabels::INSTITUTION,
            'ppua_confirm_date' => sprintf("%s %s %s", AppLabels::CONFIRM_DATE, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT),
            'ppua_freq_monitoring_obligation_code' => AppLabels::PPUA_MONITORING_OBLIGATION,
            'ppua_monitoring_data_status_code' => AppLabels::PPUA_STATUS_PROPER,
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

        $this->ppua_confirm_date = Yii::$app->formatter->asDate($this->ppua_confirm_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        $this->ppua_confirm_date = Yii::$app->formatter->asDate($this->ppua_confirm_date, AppConstants::FORMAT_DATE_PHP);
        $this->ppua_freq_monitoring_obligation_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUA_MP_FREQ_MONITORING_OBLIGATION_CODE, $this->ppua_freq_monitoring_obligation_code);
        $this->ppua_monitoring_data_status_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUA_MP_MONITORING_DATA_STATUS_CODE, $this->ppua_monitoring_data_status_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuAmbient()
    {
        return $this->hasOne(PpuAmbient::className(), ['id' => 'ppu_ambient_id']);
    }

}
