<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
/**
 * This is the model class for table "monitoring_apar".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $ma_form_month_type_code
 * @property integer $ma_year
 * @property string $ma_location
 * @property string $ma_extinguish_media
 * @property string $ma_fire_rating
 * @property string $ma_fire_class
 * @property integer $ma_weight
 * @property integer $ma_working_pressure
 * @property string $ma_tube_condition_code
 * @property string $ma_nozzle_condition_code
 * @property string $ma_handle_condition_code
 * @property string $ma_pin_condition_code
 * @property string $ma_technical_triangle
 * @property string $ma_technical_ik
 * @property string $ma_technical_card
 * @property string $ma_technical_height
 * @property string $ma_technical_dis
 * @property string $ma_noting_date
 * @property string $ma_officer
 * @property string $ma_using_date
 * @property string $ma_activity
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property MaMonth[] $maMonths
 * @property Sector $sector
 * @property PowerPlant $powerPlant
 */
class MonitoringApar extends AppModel
{
    public $ma_tube_condition_desc;
    public $ma_nozzle_condition_desc;
    public $ma_pin_condition_desc;
    public $ma_handle_condition_desc;
    public $ma_technical_triangle_desc;
    public $ma_technical_ik_desc;
    public $ma_technical_card_desc;
    public $ma_technical_height_desc;
    public $ma_technical_dis_desc;
    public $ma_form_month_type_code_desc;
    public $ma_fire_class_desc;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitoring_apar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_fire_class', 'sector_id', 'power_plant_id', 'ma_form_month_type_code', 'ma_year', 'ma_location', 'ma_extinguish_media', 'ma_fire_rating', 'ma_weight', 'ma_working_pressure', 'ma_tube_condition_code', 'ma_nozzle_condition_code', 'ma_handle_condition_code', 'ma_pin_condition_code', 'ma_technical_triangle', 'ma_technical_ik', 'ma_technical_card', 'ma_technical_height', 'ma_technical_dis', 'ma_noting_date', 'ma_officer', 'ma_using_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ma_year', 'ma_weight', 'ma_working_pressure'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ma_noting_date', 'ma_using_date'], 'safe'],
            [['ma_activity'], 'string'],
            [['ma_fire_class', 'ma_form_month_type_code', 'ma_tube_condition_code', 'ma_nozzle_condition_code', 'ma_handle_condition_code', 'ma_pin_condition_code', 'ma_technical_triangle', 'ma_technical_ik', 'ma_technical_card', 'ma_technical_height', 'ma_technical_dis'], 'string', 'max' => 10],
            [['ma_location', 'ma_extinguish_media', 'ma_officer'], 'string', 'max' => 100],
            [['ma_fire_rating'], 'string', 'max' => 50],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
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
            'ma_form_month_type_code' => AppLabels::MONTH,
            'ma_year' => AppLabels::YEAR,
            'ma_location' => AppLabels::LOCATION,
            'ma_extinguish_media' => AppLabels::MA_EXTINGUISH_MEDIA,
            'ma_fire_rating' => AppLabels::MA_FIRE_RATING,
            'ma_fire_class' => AppLabels::MA_FIRE_CLASS,
            'ma_weight' => AppLabels::MA_WEIGHT,
            'ma_working_pressure' => AppLabels::MA_WORKING_PRESSURE,
            'ma_tube_condition_code' => AppLabels::MA_TUBE,
            'ma_nozzle_condition_code' => AppLabels::MA_NOZZLE,
            'ma_handle_condition_code' => AppLabels::MA_HANDLE,
            'ma_pin_condition_code' => AppLabels::MA_PIN,
            'ma_technical_triangle' => AppLabels::MA_TRIANGLE,
            'ma_technical_ik' => AppLabels::MA_IK,
            'ma_technical_card' => AppLabels::MA_CARD,
            'ma_technical_height' => AppLabels::MA_HEIGHT,
            'ma_technical_dis' => AppLabels::MA_DISTANCE,
            'ma_noting_date' => AppLabels::DATE,
            'ma_officer' => AppLabels::MA_OFFICER,
            'ma_using_date' => AppLabels::DATE,
            'ma_activity' => AppLabels::MA_ACTIVITY,
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

            $monitoringAparId = $this->id;

            if (isset($request['MaMonth'])) {
                foreach ($request['MaMonth'] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = MaMonth::findOne(['id' => $month['id']]);

                    } else {
                        $monthTuple = new MaMonth();
                        $monthTuple->monitoring_apar_id = $monitoringAparId;
                    }

                    if (!$monthTuple->load(['MaMonth' => $month]) || !$monthTuple->save()) {
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

        if(!$this->ma_noting_date == '') {
            $this->ma_noting_date = Yii::$app->formatter->asDate($this->ma_noting_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        if(!$this->ma_using_date == '') {
            $this->ma_using_date = Yii::$app->formatter->asDate($this->ma_using_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function afterFind() {
        if(!$this->ma_noting_date == '') {
            $this->ma_noting_date = Yii::$app->formatter->asDate($this->ma_noting_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        if(!$this->ma_using_date == '') {
            $this->ma_using_date = Yii::$app->formatter->asDate($this->ma_using_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        $this->ma_tube_condition_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_CONDITION, $this->ma_tube_condition_code);
        $this->ma_nozzle_condition_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_CONDITION, $this->ma_nozzle_condition_code);
        $this->ma_handle_condition_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_CONDITION, $this->ma_handle_condition_code);
        $this->ma_pin_condition_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_CONDITION, $this->ma_pin_condition_code);
        $this->ma_technical_triangle_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_TECH_PROVI, $this->ma_technical_triangle);
        $this->ma_technical_ik_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_TECH_PROVI, $this->ma_technical_ik);
        $this->ma_technical_card_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_TECH_PROVI, $this->ma_technical_card);
        $this->ma_technical_height_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_TECH_PROVI, $this->ma_technical_height);
        $this->ma_technical_dis_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_TECH_PROVI, $this->ma_technical_dis);
        $this->ma_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->ma_form_month_type_code);
        $this->ma_fire_class_desc = Codeset::getCodesetValue(AppConstants::CODESET_M_APAR_FIRE_CLASS, $this->ma_fire_class);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaMonths()
    {
        return $this->hasMany(MaMonth::className(), ['monitoring_apar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant()
    {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
}
