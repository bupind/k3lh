<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "working_env_data".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $wed_test_date
 * @property string $wed_work_area
 * @property string $wed_executor
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WevDetail[] $wevDetails
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class WorkingEnvData extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'working_env_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'wed_test_date', 'wed_work_area', 'wed_executor'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['wed_test_date'], 'safe'],
            [['wed_work_area'], 'string', 'max' => 100],
            [['wed_executor'], 'string', 'max' => 50],
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
            'wed_test_date' => AppLabels::TEST_DATE,
            'wed_work_area' => AppLabels::WORK_AREA,
            'wed_executor' => AppLabels::EXECUTOR,
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

            $wedId = $this->id;

            if (isset($request['WevDetail'])) {
                foreach ($request['WevDetail'] as $keyD => $detail) {
                    if (isset($detail['id'])) {
                        $wedDetailTuple = WevDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $wedDetailTuple = new WevDetail();
                        $wedDetailTuple->working_env_data_id = $wedId;
                    }
                    if (!$wedDetailTuple->load(['WevDetail' => $detail]) || !$wedDetailTuple->save()) {
                        $errors = array_merge($errors, $wedDetailTuple->errors);
                        throw new Exception();
                    }
                }
            }
            $transaction->commit();
            return TRUE;
        } catch (Exception $ex) {
            $transaction->rollBack();

            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }

            return FALSE;
        }
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->wed_test_date == '') {
            $this->wed_test_date = Yii::$app->formatter->asDate($this->wed_test_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->wed_test_date == '') {
            $this->wed_test_date = Yii::$app->formatter->asDate($this->wed_test_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWevDetails()
    {
        return $this->hasMany(WevDetail::className(), ['working_env_data_id' => 'id']);
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
