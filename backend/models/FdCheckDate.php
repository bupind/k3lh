<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Exception;
/**
 * This is the model class for table "fd_check_date".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property FcdDetail[] $fcdDetails
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class FdCheckDate extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fd_check_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
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

            $fdCheckDateId = $this->id;

            if (isset($request['FcdDetail'])) {
                foreach ($request['FcdDetail'] as $key => $date) {
                    if (isset($date['id'])) {
                        $dateTuple = FcdDetail::findOne(['id' => $date['id']]);

                    } else {
                        $dateTuple = new FcdDetail();
                        $dateTuple->fd_check_date_id = $fdCheckDateId;
                    }

                    if (!$dateTuple->load(['FcdDetail' => $date]) || !$dateTuple->save()) {
                        $errors = array_merge($errors, $dateTuple->errors);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFcdDetails()
    {
        return $this->hasMany(FcdDetail::className(), ['fd_check_date_id' => 'id']);
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
