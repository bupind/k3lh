<?php

namespace backend\models;


use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ppu_emission_load_grk".
 *
 * @property integer $id
 * @property integer $ppu_emission_source_id
 * @property string $ppuelg_parameter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpuEmissionSource $ppuEmissionSource
 * @property PpuEmissionLoadGrkCalc[] $ppuEmissionLoadGrkCalcs
 */
class PpuEmissionLoadGrk extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_emission_load_grk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_emission_source_id', 'ppuelg_parameter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_emission_source_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppuelg_parameter'], 'string', 'max' => 40],
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
            'ppuelg_parameter' => AppLabels::PARAMETER,
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

            $ppuEmissionLoadGrkId = $this->id;

            if (isset($request['PpuEmissionLoadGrkCalc'])) {
                foreach ($request['PpuEmissionLoadGrkCalc'] as $key => $ppuCalc) {
                    if (isset($ppuCalc['id'])) {
                        $ppuEmLoadGrkCalc = PpuEmissionLoadGrkCalc::findOne(['id' => $ppuCalc['id']]);
                    } else {
                        $ppuEmLoadGrkCalc = new PpuEmissionLoadGrkCalc();
                        $ppuEmLoadGrkCalc->ppu_emission_load_grk_id = $ppuEmissionLoadGrkId;
                    }

                    if ($ppuEmLoadGrkCalc->load(['PpuEmissionLoadGrkCalc' => $ppuCalc]) && $ppuEmLoadGrkCalc->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_PPU_LOAD_CALCULATION_GRK, $ppuEmLoadGrkCalc->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $ppuEmLoadGrkCalc->errors);
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
    public function getPpuEmissionSource()
    {
        return $this->hasOne(PpuEmissionSource::className(), ['id' => 'ppu_emission_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuEmissionLoadGrkCalcs()
    {
        return $this->hasMany(PpuEmissionLoadGrkCalc::className(), ['ppu_emission_load_grk_id' => 'id']);
    }
}
