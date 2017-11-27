<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use common\vendor\AppConstants;
use yii\base\Exception;

/**
 * This is the model class for table "p3k_monitoring_detail".
 *
 * @property integer $id
 * @property integer $p3k_monitoring_id
 * @property string $pmd_value
 * @property string $pmd_standard_amount
 * @property string $pmd_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property P3kMonitoring $p3kMonitoring
 * @property PmdMonth[] $pmdMonths
 */
class P3kMonitoringDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'p3k_monitoring_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p3k_monitoring_id', 'pmd_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['p3k_monitoring_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['pmd_ref'], 'string'],
            [['pmd_value', 'pmd_standard_amount'], 'string', 'max' => 50],
            [['p3k_monitoring_id'], 'exist', 'skipOnError' => true, 'targetClass' => P3kMonitoring::className(), 'targetAttribute' => ['p3k_monitoring_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p3k_monitoring_id' => AppLabels::FORM_P3K_MONITORING,
            'pmd_value' => 'Isi Kotak P3K',
            'pmd_standard_amount' => 'Jumlah Standar',
            'pmd_ref' => AppLabels::DESCRIPTION,
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

            $p3kMonitoringDetailId = $this->id;

            if (isset($request['PmdMonth'])) {
                foreach ($request['PmdMonth'] as $key => $month) {
                    if (isset($month['id'])) {
                        $monthTuple = PmdMonth::findOne(['id' => $month['id']]);
                    } else {
                        $monthTuple = new PmdMonth();
                        $monthTuple->p3k_monitoring_detail_id = $p3kMonitoringDetailId;
                    }

                    if (!$monthTuple->load(['PmdMonth' => $month]) || !$monthTuple->save()) {
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
    public function getP3kMonitoring()
    {
        return $this->hasOne(P3kMonitoring::className(), ['id' => 'p3k_monitoring_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmdMonths()
    {
        return $this->hasMany(PmdMonth::className(), ['p3k_monitoring_detail_id' => 'id']);
    }
}
