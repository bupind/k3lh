<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "ppucems_report_bm".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property string $ppucemsrb_parameter_code
 * @property string $ppucemsrb_ref
 * @property string $ppucemsrb_sec_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionSource $ppuEmissionSource
 * @property PpucemsrbQuarter[] $ppucemsrbQuarters
 * @property AttachmentOwner $attachmentOwner
 */
class PpucemsReportBm extends AppModel
{
    public $ppucemsrb_parameter_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppucems_report_bm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppucemsrb_parameter_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppucemsrb_parameter_code'], 'string', 'max' => 10],
            [['ppucemsrb_ref', 'ppucemsrb_ref'], 'string', 'max' => 255],
            [['ppu_emission_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpuEmissionSource::className(), 'targetAttribute' => ['ppu_emission_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_emission_source_id' => AppLabels::EMISSION_SOURCE,
            'ppucemsrb_parameter_code' => AppLabels::PARAMETER,
            'ppucemsrb_ref' => AppLabels::DESCRIPTION,
            'ppucemsrb_sec_ref' => AppLabels::DESCRIPTION,
            'ppucemsrb_parameter_code_desc' => AppLabels::PARAMETER,
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

            $ppucemsReportBmId = $this->id;

            if (isset($request['PpucemsrbQuarter'])) {
                foreach ($request['PpucemsrbQuarter'] as $key => $rbQuarter) {
                    if (isset($rbQuarter['id'])) {
                        $rbQuarterTuple = PpucemsrbQuarter::findOne(['id' => $rbQuarter['id']]);

                    } else {
                        $rbQuarterTuple = new PpucemsrbQuarter();
                        $rbQuarterTuple->ppucems_report_bm_id = $ppucemsReportBmId;
                    }

                    if (!$rbQuarterTuple->load(['PpucemsrbQuarter' => $rbQuarter]) || !$rbQuarterTuple->save()) {
                        $errors = array_merge($errors, $rbQuarterTuple->errors);
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

    public function afterFind() {
        parent::afterFind();

       $this->ppucemsrb_parameter_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PPUCEMS_RBM_PARAM_CODE, $this->ppucemsrb_parameter_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionSource()
    {
        return $this->hasOne(PpuEmissionSource::className(), ['id' => 'ppu_emission_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpucemsrbQuarters()
    {
        return $this->hasMany(PpucemsrbQuarter::className(), ['ppucems_report_bm_id' => 'id']);
    }

    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPUCEMS_REPORT_BM]);
    }
}
