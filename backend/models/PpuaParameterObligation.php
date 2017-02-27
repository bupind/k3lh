<?php

namespace backend\models;

use common\vendor\AppConstants;
use Yii;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "ppua_parameter_obligation".
 *
 * @property integer $id
 * @property integer $ppua_monitoring_point_id
 * @property string $ppuapo_parameter_code
 * @property string $ppuapo_qs
 * @property string $ppuapo_qs_unit_code
 * @property string $ppuapo_qs_ref
 * @property string $ppuapo_qs_max_pollution_load
 * @property string $ppuapo_qs_load_unit_code
 * @property string $ppuapo_qs_max_pollution_load_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuaMonitoringPoint $ppuaMonitoringPoint
 * @property PpuapoMonth[] $ppuapoMonths
 */
class PpuaParameterObligation extends AppModel
{
    public $ppuapo_qs_display;
    public $ppuapo_qs_max_pollution_load_display;
    public $ppuapo_parameter_code_desc;
    public $ppuapo_qs_unit_code_desc;
    public $ppuapo_qs_load_unit_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppua_parameter_obligation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppua_monitoring_point_id', 'ppuapo_parameter_code', 'ppuapo_qs', 'ppuapo_qs_unit_code', 'ppuapo_qs_ref', 'ppuapo_qs_max_pollution_load', 'ppuapo_qs_load_unit_code', 'ppuapo_qs_max_pollution_load_ref'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppua_monitoring_point_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppuapo_qs', 'ppuapo_qs_max_pollution_load'], 'number'],
            [['ppuapo_parameter_code', 'ppuapo_qs_unit_code', 'ppuapo_qs_load_unit_code'], 'string', 'max' => 10],
            [['ppuapo_qs_ref', 'ppuapo_qs_max_pollution_load_ref'], 'string', 'max' => 100],
            [['ppua_monitoring_point_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuaMonitoringPoint::className(), 'targetAttribute' => ['ppua_monitoring_point_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppua_monitoring_point_id' => AppLabels::MONITORING_POINT,
            'ppuapo_parameter_code' => AppLabels::WATCHED_PARAMETER,
            'ppuapo_qs' => AppLabels::QUALITY_STANDARD,
            'ppuapo_qs_display' => AppLabels::QUALITY_STANDARD,
            'ppuapo_qs_unit_code' => AppLabels::QUALITY_STANDARD_UNIT,
            'ppuapo_qs_ref' => AppLabels::QUALITY_STANDARD_REF,
            'ppuapo_qs_max_pollution_load' => AppLabels::MAXIMUM_QS_POLLUTION_LOAD,
            'ppuapo_qs_max_pollution_load_display' => AppLabels::MAXIMUM_QS_POLLUTION_LOAD,
            'ppuapo_qs_load_unit_code' => AppLabels::QS_LOAD_UNIT,
            'ppuapo_qs_max_pollution_load_ref' => AppLabels::MAXIMUM_QS_POLLUTION_LOAD_REF,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->ppuapo_qs_display = $this->ppuapo_qs;
        $this->ppuapo_qs_max_pollution_load_display = $this->ppuapo_qs_max_pollution_load;
        $this->ppuapo_parameter_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUA_RBM_PARAM_CODE, $this->ppuapo_parameter_code);
        $this->ppuapo_qs_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUA_RBM_QS_UNIT_CODE, $this->ppuapo_qs_unit_code);
        $this->ppuapo_qs_load_unit_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUA_RBM_QS_LOAD_UNIT_CODE, $this->ppuapo_qs_load_unit_code);

        return true;
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

            $ppuaParameterObligationId = $this->id;

            if (isset($request['PpuapoMonth'])) {
                foreach ($request['PpuapoMonth'] as $key => $poMonth) {
                    if (isset($poMonth['id'])) {
                        $poMonthTuple = PpuapoMonth::findOne(['id' => $poMonth['id']]);

                    } else {
                        $poMonthTuple = new PpuapoMonth();
                        $poMonthTuple->ppua_parameter_obligation_id = $ppuaParameterObligationId;
                    }

                    if (!$poMonthTuple->load(['PpuapoMonth' => $poMonth]) || !$poMonthTuple->save()) {
                        $errors = array_merge($errors, $poMonthTuple->errors);
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
    public function getPpuaMonitoringPoint()
    {
        return $this->hasOne(PpuaMonitoringPoint::className(), ['id' => 'ppua_monitoring_point_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuapoMonths()
    {
        return $this->hasMany(PpuapoMonth::className(), ['ppua_parameter_obligation_id' => 'id']);
    }
}
