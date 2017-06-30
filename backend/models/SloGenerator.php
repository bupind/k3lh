<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\web\UploadedFile;
use yii\base\Exception;

/**
 * This is the model class for table "slo_generator".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $generator_unit
 * @property string $power_installed
 * @property string $sg_machine_name
 * @property string $sg_machine_code
 * @property string $sg_machine_brand
 * @property string $sg_machine_type
 * @property string $sg_machine_serial_number
 * @property string $sg_generator_brand
 * @property string $sg_generator_type
 * @property string $sg_generator_serial_number
 * @property string $sg_boiler_brand
 * @property integer $sg_year
 * @property integer $sg_operation_year
 * @property string $sg_form_month_type_code
 * @property string $generator_status
 * @property string $sg_number
 * @property string $sg_published
 * @property string $sg_end
 * @property string $sg_max_extension
 * @property string $sg_publisher
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner[] $attachmentOwners
 */
class SloGenerator extends AppModel
{
    public $power_installed_display;
    public $generator_status_desc;
    public $sg_form_month_type_code_desc;
    public $sg_machine_brand_desc;
    public $sg_generator_brand_desc;
    public $sg_boiler_brand_desc;
    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slo_generator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sg_year', 'sg_form_month_type_code', 'sector_id', 'power_plant_id', 'generator_unit', 'power_installed', 'sg_year', 'generator_status'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'sg_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['power_installed'], 'number'],
            [['sg_published', 'sg_end', 'sg_max_extension'], 'safe'],
            [['sg_machine_name', 'sg_machine_code', 'sg_machine_serial_number', 'sg_machine_type', 'sg_generator_type', 'sg_generator_serial_number', 'generator_unit', 'sg_number', 'sg_publisher'], 'string', 'max' => 100],
            [['sg_machine_brand', 'sg_generator_brand', 'sg_boiler_brand', 'generator_status', 'sg_form_month_type_code'], 'string', 'max' => 10],
            [['sg_year', 'sg_operation_year'], 'string', 'max' => 4],
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
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'generator_unit' => AppLabels::SG_GENERATOR_UNIT,
            'power_installed' => AppLabels::SG_POWER_INSTALLED,
            'power_installed_display' => AppLabels::SG_POWER_INSTALLED,
            'sg_operation_year' => sprintf("%s %s", AppLabels::YEAR, AppLabels::OPERATION),
            'sg_year' => AppLabels::YEAR,
            'generator_status' => AppLabels::SG_GENERATOR_STATUS,
            'sg_form_month_type_code' => AppLabels::MONTH,
            'sg_number' => AppLabels::SG_SLO_NUMBER,
            'sg_published' => AppLabels::PUBLISHED,
            'sg_end' => AppLabels::SG_END,
            'sg_max_extension' => AppLabels::SG_MAX_EXTENSION,
            'sg_publisher' => AppLabels::PUBLISHER,
            'sg_machine_name' => sprintf("%s %s", AppLabels::NAME, AppLabels::MACHINE),
            'sg_machine_code' => sprintf("%s %s", AppLabels::CODE, AppLabels::MACHINE),
            'sg_machine_brand' => sprintf("%s %s", AppLabels::BRAND, AppLabels::SG_MACHINE),
            'sg_machine_type' => sprintf("%s %s", AppLabels::TYPE, AppLabels::MACHINE),
            'sg_machine_serial_number' => sprintf("%s %s", AppLabels::SERIAL_NUMBER, AppLabels::MACHINE),
            'sg_generator_brand' => sprintf("%s %s", AppLabels::BRAND, AppLabels::GENERATOR),
            'sg_generator_type' => sprintf("%s %s", AppLabels::TYPE, AppLabels::GENERATOR),
            'sg_generator_serial_number' => sprintf("%s %s", AppLabels::SERIAL_NUMBER, AppLabels::GENERATOR),
            'sg_boiler_brand' => sprintf("%s %s", AppLabels::BRAND, AppLabels::SG_BOILER),
            'files' => AppLabels::FILES,
        ];
    }

    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);
            if ($this->save()) {
                if (isset($request['Attachment'])) {
                    $attachmentMdl = new Attachment();
                    $attachmentMdl->load($request['Attachment']);
                    $attachmentMdl->files = UploadedFile::getInstances($attachmentMdl, "files");

                    if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_SLO_GENERATOR, $this->id)) {
                        $errors = array_merge($errors, [[AppConstants::ERR_UPLOAD_FAILED]]);
                        throw new Exception;
                    }
                } else {
                    $errors = array_merge($errors, $this->errors);
                    throw new Exception();
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

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->sg_published == '') {
            $this->sg_published = Yii::$app->formatter->asDate($this->sg_published, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->sg_end == '') {
            $this->sg_end = Yii::$app->formatter->asDate($this->sg_end, AppConstants::FORMAT_DB_DATE_PHP);
        }
        if(!$this->sg_max_extension == '') {
            $this->sg_max_extension = Yii::$app->formatter->asDate($this->sg_max_extension, AppConstants::FORMAT_DB_DATE_PHP);
        }
        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->sg_published == '') {
            $this->sg_published = Yii::$app->formatter->asDate($this->sg_published, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->sg_end == '') {
            $this->sg_end = Yii::$app->formatter->asDate($this->sg_end, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        if(!$this->sg_max_extension == '') {
            $this->sg_max_extension = Yii::$app->formatter->asDate($this->sg_max_extension, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }
        $this->power_installed_display = $this->power_installed;
        $this->generator_status_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOG_GEN_UNIT_CODE, $this->generator_status);
        $this->sg_form_month_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_FORM_MONTH_TYPE_CODE, $this->sg_form_month_type_code);
        $this->sg_machine_brand_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOG_MACHINE_BRAND, $this->sg_machine_brand);
        $this->sg_generator_brand_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOG_GENERATOR_BRAND, $this->sg_generator_brand);
        $this->sg_boiler_brand_desc = Codeset::getCodesetValue(AppConstants::CODESET_SLOG_BOILER_BRAND, $this->sg_boiler_brand);

        return true;
    }

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
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
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_SLO_GENERATOR]);
    }
}
