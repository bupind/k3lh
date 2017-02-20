<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppu_compulsory_monitored_emission_source".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property string $ppucmes_name
 * @property string $ppucmes_chimney_name
 * @property string $ppucmes_operation_time
 * @property string $ppucmes_freq_monitoring_obligation_code
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppu $ppu
 * @property PpucmesMonth[] $ppucmesMonths
 */
class PpuCompulsoryMonitoredEmissionSource extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_compulsory_monitored_emission_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id', 'ppucmes_name', 'ppucmes_chimney_name', 'ppucmes_freq_monitoring_obligation_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppucmes_operation_time'], 'number'],
            [['ppucmes_name', 'ppucmes_chimney_name'], 'string', 'max' => 150],
            [['ppucmes_freq_monitoring_obligation_code'], 'string', 'max' => 10],
            [['ppu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppu::className(), 'targetAttribute' => ['ppu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_id' => AppLabels::PPU,
            'ppucmes_name' => sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE),
            'ppucmes_chimney_name' => sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY),
            'ppucmes_operation_time' => sprintf("%s (%s/%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR),
            'ppucmes_freq_monitoring_obligation_code' => AppLabels::PPUES_MONITORING_OBLIGATION,
        ];
    }

    public function saveTransactional()
    {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (isset($request['ppu_id'])){
                $this->ppu_id = $request['ppu_id'];
            }

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }



            $ppucmesId = $this->id;

            if (isset($request['PpucmesMonth'])) {
                foreach ($request['PpucmesMonth'] as $key => $ppuMonth) {
                    if (isset($ppuMonth['id'])) {
                        $ppucmesMonthTuple = PpucmesMonth::findOne(['id' => $ppuMonth['id']]);
                    } else {
                        $ppucmesMonthTuple = new PpucmesMonth();
                        $ppucmesMonthTuple->ppu_compulsory_monitored_emission_source_id = $ppucmesId;
                    }

                    if (!$ppucmesMonthTuple->load(['PpucmesMonth' => $ppuMonth]) || !$ppucmesMonthTuple->save()) {
                        $errors = array_merge($errors, $ppucmesMonthTuple->errors);
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

    public function getPpu()
    {
        return $this->hasOne(Ppu::className(), ['id' => 'ppu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpucmesMonths()
    {
        return $this->hasMany(PpucmesMonth::className(), ['ppu_compulsory_monitored_emission_source_id' => 'id']);
    }
}
