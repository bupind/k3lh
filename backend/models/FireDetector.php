<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "fire_detector".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $fd_year
 * @property string $fd_form_month_type_code
 * @property string $fd_floor_code
 * @property string $fd_location
 * @property string $fd_detector_type_code
 * @property string $fd_alarm_zone_code
 * @property string $fd_installation
 * @property string $fd_detector_physic
 * @property string $fd_wiring_condition
 * @property string $fd_last_check
 * @property string $fd_test_result_record
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property FdDetail[] $fdDetails
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class FireDetector extends AppModel
{
    public $fd_form_month_type_code_desc;
    public $fd_floor_code_desc;
    public $fd_detector_type_code_desc;
    public $fd_alarm_zone_code_desc;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fire_detector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'fd_year', 'fd_form_month_type_code', 'fd_floor_code', 'fd_location', 'fd_detector_type_code', 'fd_alarm_zone_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'fd_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['fd_installation', 'fd_wiring_condition', 'fd_test_result_record'], 'string'],
            [['fd_last_check'], 'safe'],
            [['fd_form_month_type_code', 'fd_floor_code', 'fd_detector_type_code', 'fd_alarm_zone_code'], 'string', 'max' => 10],
            [['fd_location', 'fd_detector_physic'], 'string', 'max' => 100],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'fd_year' => AppLabels::YEAR,
            'fd_form_month_type_code' => AppLabels::MONTH,
            'fd_floor_code' => AppLabels::FLOOR,
            'fd_location' => AppLabels::LOCATION,
            'fd_detector_type_code' => AppLabels::FD_DETECTOR_TYPE,
            'fd_alarm_zone_code' => AppLabels::FD_ALARM_ZONE,
            'fd_installation' => AppLabels::FD_INSTALLATION,
            'fd_detector_physic' => AppLabels::FD_DETECTOR_PHYSIC,
            'fd_wiring_condition' => AppLabels::FD_WIRING_CONDITION,
            'fd_last_check' => AppLabels::FD_LAST_CHECK,
            'fd_test_result_record' => AppLabels::FD_TEST_RESULT_RECORD,
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

            $fireDetectorId = $this->id;

            if (isset($request['FdDetail'])) {
                foreach ($request['FdDetail'] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = FdDetail::findOne(['id' => $month['id']]);

                    } else {
                        $monthTuple = new FdDetail();
                        $monthTuple->fire_detector_id = $fireDetectorId;
                    }

                    if (!$monthTuple->load(['FdDetail' => $month]) || !$monthTuple->save()) {
                        $errors = array_merge($errors, $monthTuple->errors);
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

        if(!$this->fd_last_check == '') {
            $this->fd_last_check = Yii::$app->formatter->asDate($this->fd_last_check, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {

        if(!$this->fd_last_check == '') {
            $this->fd_last_check = Yii::$app->formatter->asDate($this->fd_last_check, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        $this->fd_floor_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FD_FLOOR_TYPE, $this->fd_floor_code);
        $this->fd_detector_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FD_DETECT_TYPE, $this->fd_detector_type_code);
        $this->fd_alarm_zone_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FD_ALARM_ZONE, $this->fd_alarm_zone_code);
        $this->fd_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->fd_form_month_type_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFdDetails()
    {
        return $this->hasMany(FdDetail::className(), ['fire_detector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
}
