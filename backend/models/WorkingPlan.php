<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\base\Exception;
use yii\web\UploadedFile;
use backend\models\WorkingPlanDetail;

/**
 * This is the model class for table "working_plan".
 *
 * @property integer $id
 * @property string $form_type_code
 * @property integer $sector_id
 * @property string $wp_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Sector $sector
 * @property WorkingPlanDetail[] $workingPlanDetails
 */
class WorkingPlan extends AppModel {
    
    /**
     * @var UploadedFile
     */
    public $file;
    public $form_type_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'working_plan';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['form_type_code', 'sector_id', 'wp_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['form_type_code'], 'string', 'max' => 10],
            [['wp_year'], 'string', 'max' => 4],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'form_type_code' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'wp_year' => AppLabels::YEAR,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $this->form_type_code);
        $data = [];
        
        if (!Yii::$app->request->isPost) {
            foreach ($this->workingPlanDetails as $key => $detail) {
                $data[$detail->working_plan_attribute_id] = $detail->monthly_progress;
            }
    
            Yii::$app->session->set(AppConstants::SES_WORKING_PLAN_DETAIL, $data);
        }
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
            
            $workingPlanId = $this->id;
    
            if (isset($request['WorkingPlanDetail'])) {
                $request['WorkingPlanDetail'] = array_values($request['WorkingPlanDetail']);
                $session = Yii::$app->session->get(AppConstants::SES_WORKING_PLAN_DETAIL);
                
                foreach ($request['WorkingPlanDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailMdl = WorkingPlanDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailMdl = new WorkingPlanDetail();
                        $detailMdl->working_plan_id = $workingPlanId;
                        $detailMdl->wpd_order = $key;
                    }
        
                    if ($detailMdl->load(['WorkingPlanDetail' => $detail]) && $detailMdl->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();
                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");
    
                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_WORKING_PLAN, $detailMdl->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                        
                        if (isset($session[$detailMdl->working_plan_attribute_id])) {
                            WorkingPlanMonth::deleteAll(['working_plan_detail_id' => $detailMdl->id]);
                            foreach ($session[$detailMdl->working_plan_attribute_id] as $month => $weeks) {
                                foreach ($weeks as $weekKey => $week) {
                                    if (!empty($week)) {
                                        $wpMonthMdl = new WorkingPlanMonth();
                                        $wpMonthMdl->working_plan_detail_id = $detailMdl->id;
                                        $wpMonthMdl->wpm_month = $month;
                                        $wpMonthMdl->wpm_week = $weekKey;
                                        $wpMonthMdl->wpm_value = $week;
    
                                        if (!$wpMonthMdl->save()) {
                                            $errors = array_merge($errors, $detailMdl->errors);
                                            throw new Exception();
                                        }
                                    }
                                }
                            }
                        }
                        
                    } else {
                        $errors = array_merge($errors, $detailMdl->errors);
                        throw new Exception();
                    }
                }
            }
                    
            $transaction->commit();
            Yii::$app->session->remove(AppConstants::SES_WORKING_PLAN_DETAIL);
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
    
    public function beforeDelete() {
        parent::beforeDelete();
        
        foreach ($this->workingPlanDetails as $workingPlanDetail) {
            $workingPlanDetail->delete();
        }
        
        return true;
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
    public function getWorkingPlanDetails() {
        return $this->hasMany(WorkingPlanDetail::className(), ['working_plan_id' => 'id']);
    }
}
