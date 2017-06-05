<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "beyond_obedience_comdev".
 *
 * @property integer $id
 * @property string $boc_form_type_code
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $boc_year
 * @property integer $boc_production
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Skko $sector
 * @property BocDetail[] $bocDetails
 */
class BeyondObedienceComdev extends AppModel
{
    public $boc_production_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beyond_obedience_comdev';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['boc_form_type_code', 'sector_id', 'power_plant_id', 'boc_year', 'boc_production'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'boc_year', 'boc_production'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['boc_form_type_code'], 'string', 'max' => 10],
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
            'boc_form_type_code' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'boc_year' => AppLabels::YEAR,
            'boc_production' => AppLabels::PRODUCTION,
            'boc_production_display' => AppLabels::PRODUCTION,
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

            $bocId = $this->id;

            if (isset($request['BocDetail'])) {
                foreach ($request['BocDetail'] as $keyD => $detail) {
                    if (isset($detail['id'])) {
                        $boDetailTuple = BocDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $boDetailTuple = new BocDetail();
                        $boDetailTuple->beyond_obedience_comdev_id = $bocId;
                    }
                    if (!$boDetailTuple->load(['BocDetail' => $detail]) || !$boDetailTuple->save()) {
                        $errors = array_merge($errors, $boDetailTuple->errors);
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

    public function afterFind() {
        parent::afterFind();

        $this->boc_production_display = $this->boc_production;

        return true;
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
    public function getBocDetails()
    {
        return $this->hasMany(BocDetail::className(), ['beyond_obedience_comdev_id' => 'id']);
    }
}
