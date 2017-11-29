<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "work_accident_detail".
 *
 * @property integer $id
 * @property integer $work_accident_id
 * @property string $wad_date
 * @property string $wad_event
 * @property string $wad_type
 * @property string $wad_work_area
 * @property string $wad_address
 * @property string $wad_impact_corp
 * @property string $wad_impact_indi
 * @property string $wad_chronology
 * @property string $wad_inv_date
 * @property string $wad_inv_team
 * @property string $wad_inv_k3_action
 * @property string $wad_inv_uns_condition
 * @property string $wad_inv_uns_action
 * @property string $wad_result
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WorkAccident $workAccident
 */
class WorkAccidentDetail extends AppModel
{
    public $wad_type_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_accident_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_accident_id', 'wad_date', 'wad_event', 'wad_type'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['work_accident_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['wad_date', 'wad_inv_date'], 'safe'],
            [['wad_work_area', 'wad_address', 'wad_impact_corp', 'wad_impact_indi', 'wad_chronology', 'wad_result'], 'string'],
            [['wad_event', 'wad_inv_team', 'wad_inv_k3_action', 'wad_inv_uns_condition', 'wad_inv_uns_action'], 'string', 'max' => 50],
            [['wad_type'], 'string', 'max' => 10],
            [['work_accident_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkAccident::className(), 'targetAttribute' => ['work_accident_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_accident_id' => AppLabels::FORM_WORK_ACCIDENT,
            'wad_date' => AppLabels::DATE,
            'wad_event' => AppLabels::EVENT,
            'wad_type' => 'Jenis Kecelakaan',
            'wad_work_area' => AppLabels::WORK_AREA,
            'wad_address' => AppLabels::ADDRESS,
            'wad_impact_corp' => AppLabels::COMPANY,
            'wad_impact_indi' => 'Individual',
            'wad_chronology' => 'Kronologis Kejadian',
            'wad_inv_date' => AppLabels::DATE,
            'wad_inv_team' => 'Tim Investigasi',
            'wad_inv_k3_action' => 'Penerapan K3',
            'wad_inv_uns_condition' => 'Unsafe Condition',
            'wad_inv_uns_action' => 'Unsafe Act',
            'wad_result' => 'Kesimpulan Investigasi',
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->wad_date == '') {
            $this->wad_date = Yii::$app->formatter->asDate($this->wad_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        if(!$this->wad_inv_date == '') {
            $this->wad_inv_date = Yii::$app->formatter->asDate($this->wad_inv_date, AppConstants::FORMAT_DB_DATE_PHP);
        }


        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->wad_date == '') {
            $this->wad_date = Yii::$app->formatter->asDate($this->wad_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        if(!$this->wad_inv_date == '') {
            $this->wad_inv_date = Yii::$app->formatter->asDate($this->wad_inv_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        $this->wad_type_desc = Codeset::getCodesetValue(AppConstants::CODESET_WA_WORK_ACCIDENT_TYPE, $this->wad_type);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkAccident()
    {
        return $this->hasOne(WorkAccident::className(), ['id' => 'work_accident_id']);
    }
}
