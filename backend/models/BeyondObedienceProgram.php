<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Exception;
/**
 * This is the model class for table "beyond_obedience_program".
 *
 * @property integer $id
 * @property string $bop_form_type_code
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $bop_year
 * @property integer $bop_production
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property BopDetail[] $bopDetails
 */
class BeyondObedienceProgram extends AppModel
{
    public $bop_production_display;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beyond_obedience_program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bop_form_type_code', 'sector_id', 'power_plant_id', 'bop_year', 'bop_production'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'bop_year', 'bop_production'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['bop_form_type_code'], 'string', 'max' => 10],
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
            'bop_form_type_code' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'bop_year' => AppLabels::YEAR,
            'bop_production' => AppLabels::PRODUCTION,
            'bop_production_display' => AppLabels::PRODUCTION,
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

            $bopId = $this->id;

            if (isset($request['BopDetail'])) {
                foreach ($request['BopDetail'] as $keyD => $detail) {
                    if (isset($detail['id'])) {
                        $boDetailTuple = BopDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $boDetailTuple = new BopDetail();
                        $boDetailTuple->beyond_obedience_program_id = $bopId;
                    }
                    if (!$boDetailTuple->load(['BopDetail' => $detail]) || !$boDetailTuple->save()) {
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

        $this->bop_production_display = $this->bop_production;

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
    public function getBopDetails()
    {
        return $this->hasMany(BopDetail::className(), ['beyond_obedience_program_id' => 'id']);
    }
}
