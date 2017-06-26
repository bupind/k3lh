<?php

namespace backend\models;

use common\components\helpers\Converter;
use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "project_tracking_detail".
 *
 * @property integer $id
 * @property integer $project_tracking_id
 * @property string $ptd_step
 * @property string $ptd_pic_code
 * @property string $ptd_status
 * @property integer $ptd_duration
 * @property string $ptd_start_date
 * @property string $ptd_progress_percentage
 * @property string $ptd_information
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property ProjectTracking $projectTracking
 * @property AttachmentOwner[] $attachmentOwners
 */
class ProjectTrackingDetail extends AppModel {
    
    public $ptd_progress_percentage_display;
    public $end_date;
    public $progress_accumulation;
    public $files;
    public $ptd_pic_code_desc;
    public $ptd_status_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'project_tracking_detail';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['project_tracking_id', 'ptd_step'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['project_tracking_id', 'ptd_duration'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ptd_start_date'], 'safe'],
            [['ptd_start_date'], 'date', 'format' => AppConstants::FORMAT_DATE_PHP, 'message' => AppConstants::VALIDATE_DATE],
            [['ptd_progress_percentage'], 'number'],
            [['ptd_step', 'ptd_information'], 'string', 'max' => 255],
            [['ptd_pic_code'], 'string', 'max' => 10],
            [['ptd_status'], 'string', 'max' => 1],
            [['ptd_duration'], 'string', 'max' => 4],
            [['project_tracking_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectTracking::className(), 'targetAttribute' => ['project_tracking_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'project_tracking_id' => AppLabels::PROJECT_TRACKING,
            'ptd_step' => AppLabels::PT_STEP,
            'ptd_pic_code' => AppLabels::PT_PIC,
            'ptd_status' => AppLabels::STATUS,
            'ptd_pic_code_desc' => AppLabels::PT_PIC,
            'ptd_status_desc' => AppLabels::STATUS,
            'ptd_duration' => AppLabels::PT_DURATION,
            'ptd_start_date' => AppLabels::START_DATE,
            'ptd_progress_percentage' => sprintf('%s (%%)', AppLabels::PROGRESS),
            'ptd_progress_percentage_display' => sprintf('%s (%%)', AppLabels::PROGRESS),
            'ptd_information' => AppLabels::INFORMATION,
            'end_date' => AppLabels::END_DATE,
            'progress_accumulation' => sprintf('%s (%%)', AppLabels::PROGRESS_ACCUMULATION),
            'files' => AppLabels::FILES
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
    
            $projectTrackingDetailId = $this->id;
    
            if (isset($request['Attachment'])) {
                $attachmentMdl = new Attachment();
                $attachmentMdl->load($request['Attachment']);
                $attachmentMdl->files = UploadedFile::getInstances($attachmentMdl, "files");
        
                if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_PROJECT_TRACKING, $projectTrackingDetailId)) {
                    $errors = array_merge($errors, [[AppConstants::ERR_UPLOAD_FAILED]]);
                    throw new Exception;
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
        
        $this->ptd_start_date = !empty($this->ptd_start_date) ? Yii::$app->formatter->asDate($this->ptd_start_date, AppConstants::FORMAT_DB_DATE_PHP) : '';
    
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $startDate = new \DateTime($this->ptd_start_date);
        $startDate->add(new \DateInterval(sprintf('P%sD', $this->ptd_duration)));
        
        $this->ptd_start_date = Yii::$app->formatter->asDate($this->ptd_start_date, AppConstants::FORMAT_DATE_PHP);
        $this->end_date = $startDate->format(AppConstants::FORMAT_DATE);
        
        $this->ptd_pic_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PROJECT_TRACKING_LIST, $this->ptd_pic_code);
        $this->ptd_status_desc = Converter::format($this->ptd_status, AppConstants::FORMAT_TYPE_OPEN_CLOSE);
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTracking() {
        return $this->hasOne(ProjectTracking::className(), ['id' => 'project_tracking_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PROJECT_TRACKING]);
    }
}
