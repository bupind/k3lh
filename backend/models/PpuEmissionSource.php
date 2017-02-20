<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ppu_emission_source".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property string $ppues_name
 * @property string $ppues_chimney_name
 * @property integer $ppues_capacity
 * @property string $ppues_control_device
 * @property string $ppues_fuel_name_code
 * @property string $ppues_total_fuel
 * @property string $ppues_fuel_unit_code
 * @property string $ppues_operation_time
 * @property string $ppues_location
 * @property string $ppues_coord_ls
 * @property string $ppues_coord_bt
 * @property string $ppues_chimney_shape_code
 * @property string $ppues_chimney_height
 * @property string $ppues_chimney_diameter
 * @property integer $ppues_hole_position
 * @property string $ppues_monitoring_data_status_code
 * @property string $ppues_freq_monitoring_obligation_code
 * @property string $ppues_ref
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppu $ppu
 *
 * @property AttachmentOwner $attachmentOwner
 */
class PpuEmissionSource extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_emission_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id', 'ppues_name', 'ppues_chimney_name', 'ppues_capacity', 'ppues_control_device', 'ppues_fuel_name_code', 'ppues_total_fuel', 'ppues_fuel_unit_code', 'ppues_operation_time', 'ppues_location', 'ppues_coord_ls', 'ppues_coord_bt', 'ppues_chimney_shape_code', 'ppues_chimney_height', 'ppues_chimney_diameter', 'ppues_hole_position', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppu_id', 'ppues_capacity', 'ppues_hole_position'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ppues_total_fuel', 'ppues_operation_time', 'ppues_chimney_height', 'ppues_chimney_diameter'], 'number'],
            [['ppues_name', 'ppues_chimney_name', 'ppues_location'], 'string', 'max' => 150],
            [['ppues_control_device', 'ppues_ref'], 'string', 'max' => 255],
            [['ppues_fuel_name_code', 'ppues_fuel_unit_code', 'ppues_chimney_shape_code', 'ppues_monitoring_data_status_code', 'ppues_freq_monitoring_obligation_code'], 'string', 'max' => 10],
            [['ppues_coord_ls', 'ppues_coord_bt'], 'string', 'max' => 50],
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
            'ppues_name' => sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE),
            'ppues_chimney_name' => sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY),
            'ppues_capacity' => sprintf("%s %s (%s)", AppLabels::CAPACITY, AppLabels::EMISSION_SOURCE, AppLabels::MW),
            'ppues_control_device' => AppLabels::EMISSION_CONTROL_TOOL,
            'ppues_fuel_name_code' => AppLabels::FUEL_NAME,
            'ppues_total_fuel' => sprintf("%s /%s", AppLabels::TOTAL_FUEL, AppLabels::YEAR),
            'ppues_fuel_unit_code' => AppLabels::FUEL_UNIT,
            'ppues_operation_time' => sprintf("%s (%s/%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR, AppLabels::YEAR),
            'ppues_location' => AppLabels::LOCATION,
            'ppues_coord_ls' => AppLabels::LS,
            'ppues_coord_bt' => AppLabels::BT,
            'ppues_chimney_shape_code' => sprintf("%s %s", AppLabels::SHAPE, AppLabels::CHIMNEY),
            'ppues_chimney_height' => sprintf("%s/%s %s (%s)", AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::CHIMNEY, AppLabels::M),
            'ppues_chimney_diameter' => sprintf("%s %s (%s)", AppLabels::DIAMETER, AppLabels::CHIMNEY, AppLabels::M),
            'ppues_hole_position' => sprintf("%s (%s/%s) %s", AppLabels::POSITION, AppLabels::HEIGHT, AppLabels::LENGTH, AppLabels::SAMPLING_HOLE),
            'ppues_monitoring_data_status_code' => sprintf("%s", AppLabels::PPUES_STATUS_PROPER),
            'ppues_freq_monitoring_obligation_code' => AppLabels::PPUES_MONITORING_OBLIGATION,
            'ppues_ref' => AppLabels::DESCRIPTION,
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

            if ($this->save()) {
                if (isset($request['Attachment'])) {
                    $attachmentMdl = new Attachment();

                    $attachmentMdl->load($request['Attachment']);
                    $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "file");

                    if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_PPU_EMISSION_SOURCE, $this->id)) {
                        $errors = array_merge($errors, $attachmentMdl->errors);
                        throw new Exception;
                    }
                }
            }else{
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
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

    public function beforeDelete()
    {
        $attachment = $this->attachmentOwner->attachment;
        $attachment->delete();
        return parent::beforeDelete();
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
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPU_EMISSION_SOURCE]);
    }
}