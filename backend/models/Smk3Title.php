<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "smk3_title".
 *
 * @property integer $id
 * @property string $sttl_title
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Subtitle[] $smk3Subtitles
 */
class Smk3Title extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sttl_title'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sttl_title'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sttl_title' => AppLabels::SMK3_TITLE,
        ];
    }

    public function saveTransactional() {
        $request = Yii::$app->request->post();
        d($request);
        exit;
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $budgetMonitoringLHId = $this->id;

            if (isset($request['BudgetMonitoringDetail'])) {
                foreach ($request['BudgetMonitoringDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailTuple = BudgetMonitoringDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailTuple = new BudgetMonitoringDetail();
                        $detailTuple->budget_monitoring_id = $budgetMonitoringLHId;
                    }

                    if (!$detailTuple->load(['BudgetMonitoringDetail' => $detail]) || !$detailTuple->save()) {
                        $errors = array_merge($errors, $detailTuple->errors);
                        throw new Exception();
                    }

                    if (isset($request['BudgetMonitoringMonth'][$key])) {
                        foreach ($request['BudgetMonitoringMonth'][$key] as $key2 => $month) {
                            if (isset($month['id'])) {
                                $monthTuple = BudgetMonitoringMonth::findOne(['id' => $month['id']]);
                            } else {
                                $monthTuple = new BudgetMonitoringMonth();
                                $monthTuple->budget_monitoring_detail_id = $detailTuple->id;
                                $monthTuple->bmv_month = $key2 + 1;
                            }

                            if (!$monthTuple->load(['BudgetMonitoringMonth' => $month]) || !$monthTuple->save()) {
                                $errors = array_merge($errors, $monthTuple->errors);
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
    public function getSmk3Subtitles()
    {
        return $this->hasMany(Smk3Subtitle::className(), ['smk3_title_id' => 'id']);
    }
}
