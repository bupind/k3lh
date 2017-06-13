<?php

namespace backend\models;

use common\vendor\AppConstants;
use Yii;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "hydrant_checklist".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $hc_number
 * @property string $hc_location
 * @property string $hc_date
 * @property string $hc_note
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HcDetail[] $hcDetails
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 */
class HydrantChecklist extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hydrant_checklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'hc_number', 'hc_location', 'hc_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'hc_number'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hc_date'], 'safe'],
            [['hc_location'], 'string', 'max' => 100],
            [['hc_note'], 'string'],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
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

            $hydrantChecklistId = $this->id;

            if (isset($request['HcDetail'])) {
                foreach ($request['HcDetail'] as $keyA => $hcAnswer) {
                    if (isset($hcAnswer['id'])) {
                        $hcAnswerTuple = HcDetail::findOne(['id' => $hcAnswer['id']]);

                    } else {
                        $hcAnswerTuple = new HcDetail();
                        $hcAnswerTuple->hydrant_checklist_id = $hydrantChecklistId;
                    }
                    if (!$hcAnswerTuple->load(['HcDetail' => $hcAnswer]) || !$hcAnswerTuple->save()) {
                        $errors = array_merge($errors, $hcAnswerTuple->errors);
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

        if(!$this->hc_date == '') {
            $this->hc_date = Yii::$app->formatter->asDate($this->hc_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {

        if(!$this->hc_date == '') {
            $this->hc_date = Yii::$app->formatter->asDate($this->hc_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
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
            'hc_number' => AppLabels::HC_NUMBER,
            'hc_location' => AppLabels::LOCATION,
            'hc_date' => AppLabels::DATE,
            'hc_note' => AppLabels::NOTE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHcDetails()
    {
        return $this->hasMany(HcDetail::className(), ['hydrant_checklist_id' => 'id']);
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

    public function getHcDetailByQuestion($questionId){
        return HcDetail::find()->where(['hydrant_checklist_id' => $this->id, 'hydrant_question_id' => $questionId])->one();
    }
}
