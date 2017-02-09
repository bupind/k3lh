<?php

namespace backend\models;

use Yii;
use yii\db\Command;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "smk3".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $smk3_year
 * @property integer $smk3_quarter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property Smk3Detail[] $smk3Details
 */
class Smk3 extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'smk3_year', 'smk3_quarter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'smk3_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['smk3_quarter'], 'string', 'max' => 2],
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
            'smk3_year' => AppLabels::YEAR,
            'smk3_quarter' => AppLabels::QUARTER,
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

            $smk3Id = $this->id;

            if (isset($request['Smk3Detail'])) {
                foreach ($request['Smk3Detail'] as $key => $index) {
                    foreach ($index as $key2 => $index2) {
                        foreach ($index2 as $key3 => $detail) {
                            if (isset($detail['id'])) {
                                $detailTuple = Smk3Detail::findOne(['id' => $detail['id']]);
                            } else {
                                $detailTuple = new Smk3Detail();
                                $detailTuple->smk3_id = $smk3Id;
                            }

                            if (!$detailTuple->load(['Smk3Detail' => $detail]) || !$detailTuple->save()) {
                                $errors = array_merge($errors, $detailTuple->errors);
                                throw new Exception();
                            }
                        }
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmk3Answers()
    {
        return $this->hasMany(Smk3Detail::className(), ['smk3_id' => 'id']);
    }
}
