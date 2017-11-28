<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "working_hour_monitoring".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $worker_type
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property WhmMonth[] $whmMonths
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class WorkingHourMonitoring extends AppModel
{
    public $worker_type_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'working_hour_monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'worker_type'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['worker_type'], 'string', 'max' => 10],
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
            'worker_type' => 'Pekerja',
        ];
    }

    public function saveTransactional()
    {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $workingHourMonitoringId = $this->id;

            if (isset($request['WhmMonth'])) {
                foreach ($request['WhmMonth'] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = WhmMonth::findOne(['id' => $month['id']]);
                    } else {
                        $monthTuple = new WhmMonth();
                        $monthTuple->working_hour_monitoring_id = $workingHourMonitoringId;
                    }

                    if (!$monthTuple->load(['WhmMonth' => $month]) || !$monthTuple->save()) {
                        $errors = array_merge($errors, $monthTuple->errors);
                        throw new Exception();
                    }
                }
            }

            $transaction->commit();
            return TRUE;

        } catch (Exception $e) {
            $transaction->rollBack();
            $this->afterFind();

            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }

            return FALSE;
        }
    }

    public function afterFind() {
        parent::afterFind();

        $this->worker_type_desc = Codeset::getCodesetValue(AppConstants::CODESET_WHM_WORKER_TYPE, $this->worker_type);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWhmMonths()
    {
        return $this->hasMany(WhmMonth::className(), ['working_hour_monitoring_id' => 'id']);
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
