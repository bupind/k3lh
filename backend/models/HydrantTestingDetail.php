<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;


/**
 * This is the model class for table "hydrant_testing_detail".
 *
 * @property integer $id
 * @property integer $hydrant_testing_id
 * @property string $htd_number
 * @property string $htd_location
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HtdMonth[] $htdMonths
 * @property HtdMonth[] $htdMonthsElectrical
 * @property HtdMonth[] $htdMonthsDiesel
 * @property HydrantTesting $hydrantTesting
 */
class HydrantTestingDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hydrant_testing_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hydrant_testing_id', 'htd_number'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hydrant_testing_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['htd_number', 'htd_location'], 'string', 'max' => 50],
            [['hydrant_testing_id'], 'exist', 'skipOnError' => true, 'targetClass' => HydrantTesting::className(), 'targetAttribute' => ['hydrant_testing_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hydrant_testing_id' => AppLabels::FORM_HYDRANT_TESTING,
            'htd_number' => 'Nomor Hydrant',
            'htd_location' => AppLabels::LOCATION,
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

            $hydrantTestingDetailId = $this->id;

            if (isset($request['HtdMonth'])) {
                foreach ($request['HtdMonth'][0] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = HtdMonth::findOne(['id' => $month['id']]);
                    } else {
                        $monthTuple = new HtdMonth();
                        $monthTuple->hydrant_testing_detail_id = $hydrantTestingDetailId;
                    }

                    if (!$monthTuple->load(['HtdMonth' => $month]) || !$monthTuple->save()) {
                        $errors = array_merge($errors, $monthTuple->errors);
                        throw new Exception();
                    }
                }
                foreach ($request['HtdMonth'][1] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = HtdMonth::findOne(['id' => $month['id']]);
                    } else {
                        $monthTuple = new HtdMonth();
                        $monthTuple->hydrant_testing_detail_id = $hydrantTestingDetailId;
                    }

                    if (!$monthTuple->load(['HtdMonth' => $month]) || !$monthTuple->save()) {
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtdMonths()
    {
        return $this->hasMany(HtdMonth::className(), ['hydrant_testing_detail_id' => 'id'])->orderBy(['htdm_month' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtdMonthsElectrical()
    {
        return $this->hasMany(HtdMonth::className(), ['hydrant_testing_detail_id' => 'id'])->where(['htdm_pump_type' => AppConstants::HT_ELECTRICAL_PUMP])->orderBy(['htdm_month' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHtdMonthsDiesel()
    {
        return $this->hasMany(HtdMonth::className(), ['hydrant_testing_detail_id' => 'id'])->where(['htdm_pump_type' => AppConstants::HT_DIESEL_PUMP])->orderBy(['htdm_month' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHydrantTesting()
    {
        return $this->hasOne(HydrantTesting::className(), ['id' => 'hydrant_testing_id']);
    }
}
