<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "working_permit".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $wp_registration_number
 * @property string $wp_submit_date
 * @property integer $wp_revision_number
 * @property integer $wp_page
 * @property string $wp_work_type
 * @property string $wp_work_details
 * @property string $wp_work_location
 * @property string $wp_company_department
 * @property string $wp_leader_name
 * @property string $wp_leader_phone
 * @property string $wp_supervisor_name
 * @property string $wp_supervisor_phone
 * @property string $wp_start_date
 * @property string $wp_end_date
 * @property integer $wp_pln_noe
 * @property integer $wp_outsource_noe
 * @property string $wp_job_classification
 * @property string $wp_k3_rules
 * @property string $wp_self_protection
 * @property string $wp_dangerous_work_type
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner[] $attachmentOwners
 */
class WorkingPermit extends AppModel {
    
    public $work_duration;
    public $job_classification_text;
    public $k3_rules_text;
    public $self_protection_text;
    public $dangerous_work_text;
    
    public $job_classification_array = [];
    public $k3_rules_array = [];
    public $self_protection_array = [];
    public $dangerous_work_array = [];
    public $files;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'working_permit';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'wp_registration_number', 'wp_submit_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'wp_revision_number', 'wp_page', 'wp_pln_noe', 'wp_outsource_noe'], 'integer'],
            [['wp_revision_number', 'wp_page', 'wp_pln_noe', 'wp_outsource_noe'], 'string', 'max' => 3],
            [['wp_submit_date', 'wp_start_date', 'wp_end_date'], 'safe'],
            [['wp_submit_date'], 'date', 'format' => AppConstants::FORMAT_DATE_PHP, 'message' => AppConstants::VALIDATE_DATE],
            [['wp_start_date', 'wp_end_date'], 'date', 'format' => AppConstants::FORMAT_DATETIME_PHP, 'message' => AppConstants::VALIDATE_DATE],
            [['wp_work_details', 'wp_job_classification', 'wp_k3_rules', 'wp_self_protection', 'wp_dangerous_work_type'], 'string'],
            [['wp_registration_number', 'wp_company_department', 'wp_leader_name', 'wp_supervisor_name'], 'string', 'max' => 150],
            [['wp_work_type', 'wp_work_location'], 'string', 'max' => 255],
            [['wp_leader_phone', 'wp_supervisor_phone'], 'string', 'max' => 15],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'wp_registration_number' => AppLabels::WP_REGISTRATION_NUMBER,
            'wp_submit_date' => AppLabels::SUBMIT_DATE,
            'wp_revision_number' => AppLabels::REVISION_NUMBER,
            'wp_page' => AppLabels::PAGE,
            'wp_work_type' => AppLabels::WORK_TYPE,
            'wp_work_details' => AppLabels::WORK_DETAIL,
            'wp_work_location' => AppLabels::WORK_LOCATION,
            'wp_company_department' => AppLabels::WP_COMPANY_DEPARTMENT,
            'wp_leader_name' => AppLabels::WP_LEADER,
            'wp_leader_phone' => AppLabels::PHONE,
            'wp_supervisor_name' => AppLabels::WP_SUPERVISOR,
            'wp_supervisor_phone' => AppLabels::PHONE,
            'wp_start_date' => AppLabels::START_DATE,
            'wp_end_date' => AppLabels::END_DATE,
            'wp_pln_noe' => AppLabels::WP_PLN_NOE,
            'wp_outsource_noe' => AppLabels::WP_OUTSOURCE_NOE,
            'wp_job_classification' => AppLabels::WP_JOB_CLASSIFICATION,
            'wp_k3_rules' => AppLabels::WP_K3_RULES,
            'wp_self_protection' => AppLabels::WP_SELF_PROTECTION,
            'wp_dangerous_work_type' => AppLabels::WP_DANGEROUS_WORK_TYPE,
            'work_duration' => AppLabels::WP_WORK_DURATION,
            'job_classification_text' => AppLabels::WP_JOB_CLASSIFICATION,
            'k3_rules_text' => AppLabels::WP_K3_RULES,
            'self_protection_text' => AppLabels::WP_SELF_PROTECTION,
            'dangerous_work_text' => AppLabels::WP_DANGEROUS_WORK_TYPE,
            'files' => AppLabels::FILES,
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
    
        $request = Yii::$app->request->post();
        
        $this->wp_submit_date = !empty($this->wp_submit_date) ? Yii::$app->formatter->asDate($this->wp_submit_date, AppConstants::FORMAT_DB_DATE_PHP) : '';
        $this->wp_start_date = !empty($this->wp_start_date) ? Yii::$app->formatter->asDate($this->wp_start_date, AppConstants::FORMAT_DB_DATETIME_PHP) : '';
        $this->wp_end_date = !empty($this->wp_end_date) ? Yii::$app->formatter->asDate($this->wp_end_date, AppConstants::FORMAT_DB_DATETIME_PHP) : '';
        
        $this->wp_job_classification = $this->checkboxToString($request['wp_job_classifications']);
        $this->wp_k3_rules = $this->checkboxToString($request['wp_k3_rules']);
        $this->wp_self_protection = $this->checkboxToString($request['wp_self_protections']);
        $this->wp_dangerous_work_type = $this->checkboxToString($request['wp_dangerous_works']);
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
    
        $startDate = new \DateTime($this->wp_start_date);
        $endDate = new \DateTime($this->wp_end_date);
        $diff = $endDate->diff($startDate);
        
        $this->wp_submit_date = Yii::$app->formatter->asDate($this->wp_submit_date, AppConstants::FORMAT_DATE_PHP);
        $this->wp_start_date = Yii::$app->formatter->asDate($this->wp_start_date, AppConstants::FORMAT_DATETIME_PHP);
        $this->wp_end_date = Yii::$app->formatter->asDate($this->wp_end_date, AppConstants::FORMAT_DATETIME_PHP);
        $this->work_duration = sprintf('%s %s', $diff->days, AppLabels::DAY);
        
        $this->job_classification_text = $this->toView(AppConstants::CODESET_WORKING_PERMIT_JOB_CLASSIFICATION, $this->wp_job_classification);
        $this->k3_rules_text = $this->toView(AppConstants::CODESET_WORKING_PERMIT_K3_RULES, $this->wp_k3_rules);
        $this->self_protection_text = $this->toView(AppConstants::CODESET_WORKING_PERMIT_SELF_PROTECTION, $this->wp_self_protection);
        $this->dangerous_work_text = $this->toView(AppConstants::CODESET_WORKING_PERMIT_DANGEROUS_WORK, $this->wp_dangerous_work_type);
        
        $this->job_classification_array = $this->toWPArray($this->wp_job_classification);
        $this->k3_rules_array = $this->toWPArray($this->wp_k3_rules);
        $this->self_protection_array = $this->toWPArray($this->wp_self_protection);
        $this->dangerous_work_array = $this->toWPArray($this->wp_dangerous_work_type);
        
        return true;
    }
    
    private function checkboxToString($stacks) {
        $strings = [];
        foreach ($stacks as $key => $val) {
            if (is_int($key)) {
                $temp = $val;
                if (isset($stacks[$val])) {
                    $temp .= sprintf('%s%s', AppConstants::CONCAT, $stacks[$val]);
                }
                
                $strings[] = $temp;
            }
        }
        return !empty($strings) ? join(AppConstants::DELIMITER, $strings) : '';
    }
    
    private function toView($csetName, $string) {
        $text = [];
        foreach (explode(AppConstants::DELIMITER, $string) as $csetCode) {
            $concat = explode(AppConstants::CONCAT, $csetCode);
            if (count($concat) > 1) {
                $temp = sprintf("%s: <strong>%s</strong>", Codeset::getCodesetValue($csetName, $concat[0]), $concat[1]);
            } else {
                $temp = Codeset::getCodesetValue($csetName, $csetCode);
            }
            
            $text[] = $temp;
        }
        
        return $text;
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

                    if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_WORKING_PERMIT, $this->id)) {
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
    
    private function toWPArray($string) {
        $array = [];
        foreach (explode(AppConstants::DELIMITER, $string) as $csetCode) {
            $concat = explode(AppConstants::CONCAT, $csetCode);
            if (count($concat) > 1) {
                $array[] = $concat[0];
                $array[$concat[0]] = $concat[1];
            } else {
                $array[] = $csetCode;
            }
        }
        
        return $array;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant() {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_WORKING_PERMIT]);
    }
}
