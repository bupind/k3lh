<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "plb3_sa_form".
 *
 * @property integer $id
 * @property integer $plb3_self_assessment_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3SelfAssessment $plb3SelfAssessment
 * @property Plb3SaFormDetail[] $plb3SaFormDetails
 * @property Plb3SaFormDetail $plb3SaFormDetailByQuestion
 * @property Plb3SaFormDetailStatic $plb3SaFormDetailStatic
 * @property Plb3SaFormDetailStaticQuarter[] $plb3SaFormDetailStaticQuarters
 */
class Plb3SaForm extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plb3_sa_form';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plb3_self_assessment_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_self_assessment_id'], 'integer'],
            [['plb3_self_assessment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3SelfAssessment::className(), 'targetAttribute' => ['plb3_self_assessment_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'plb3_self_assessment_id' => AppLabels::SELF_ASSESSMENT_SHORT,
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
    
            $plb3SaFormId = $this->id;
            if (isset($request['Plb3SaFormDetail'])) {
                foreach ($request['Plb3SaFormDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailMdl = Plb3SaFormDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailMdl = new Plb3SaFormDetail();
                        $detailMdl->plb3_sa_form_id = $plb3SaFormId;
                    }
    
                    if ($detailMdl->load(['Plb3SaFormDetail' => $detail]) && $detailMdl->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();
                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->files = UploadedFile::getInstances($attachmentMdl, "[$key]files");
            
                            if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_PLB3_SA, $detailMdl->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    } else {
                        $errors = array_merge($errors, $detailMdl->errors);
                        throw new Exception();
                    }
                }
            }
            
            if (isset($request['Plb3SaFormDetailStatic'])) {
                if (isset($request['Plb3SaFormDetailStatic']['id'])) {
                    $staticMdl = Plb3SaFormDetailStatic::findOne($request['Plb3SaFormDetailStatic']['id']);
                } else {
                    $staticMdl = new Plb3SaFormDetailStatic();
                    $staticMdl->plb3_sa_form_id = $plb3SaFormId;
                }
                
                if ($staticMdl->load($request) && $staticMdl->save()) {
                    $index = $request['Plb3SaFormDetailStatic']['index'];
                    if (isset($request['Attachment'][$index])) {
                        $attachmentStaticMdl = new Attachment();
                        $attachmentStaticMdl->load($request['Attachment'][$index]);
                        $attachmentStaticMdl->files = UploadedFile::getInstances($attachmentStaticMdl, "[$index]files");
                        
                        if (!empty($attachmentStaticMdl->files) && !$attachmentStaticMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_PLB3_SA_STATIC, $staticMdl->id)) {
                            $errors = array_merge($errors, $attachmentStaticMdl->errors);
                            throw new Exception;
                        }
                    }
                } else {
                    $errors = array_merge($errors, $staticMdl->errors);
                    throw new Exception();
                }
            }
    
            if (isset($request['Plb3SaFormDetailStaticQuarter'])) {
                foreach ($request['Plb3SaFormDetailStaticQuarter'] as $key => $quarterDetail) {
                    if (isset($quarterDetail['id'])) {
                        $quarterDetailMdl = Plb3SaFormDetailStaticQuarter::findOne(['id' => $quarterDetail['id']]);
                    } else {
                        $quarterDetailMdl = new Plb3SaFormDetailStaticQuarter();
                        $quarterDetailMdl->plb3_sa_form_id = $plb3SaFormId;
                    }
                    
                    if ($quarterDetailMdl->load(['Plb3SaFormDetailStaticQuarter' => $quarterDetail]) && $quarterDetailMdl->save()) {
                        $index = isset($quarterDetail['index']) ? $quarterDetail['index'] : null;
                        if (!is_null($index) && isset($request['Attachment'][$index])) {
                            $attachmentStaticQuarterMdl = new Attachment();
                            $attachmentStaticQuarterMdl->load($request['Attachment'][$index]);
                            $attachmentStaticQuarterMdl->files = UploadedFile::getInstances($attachmentStaticQuarterMdl, "[$index]files");
    
                            if (!empty($attachmentStaticQuarterMdl->files) && !$attachmentStaticQuarterMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_PLB3_SA_STATIC_QUARTERLY, $quarterDetailMdl->id)) {
                                $errors = array_merge($errors, $attachmentStaticQuarterMdl->errors);
                                throw new Exception;
                            }
                        }
                    } else {
                        $errors = array_merge($errors, $quarterDetailMdl->errors);
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
    
    public function beforeDelete() {
        parent::beforeDelete();
        
        foreach ($this->plb3SaFormDetails as $plb3SaFormDetail) {
            if (!empty($plb3SaFormDetail->attachmentOwners)) {
                foreach ($plb3SaFormDetail->attachmentOwners as $attachmentOwner) {
                    $attachmentOwner->attachment->delete();
                }
            }
        }
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SelfAssessment() {
        return $this->hasOne(Plb3SelfAssessment::className(), ['id' => 'plb3_self_assessment_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaFormDetails() {
        return $this->hasMany(Plb3SaFormDetail::className(), ['plb3_sa_form_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaFormDetailStatic() {
        return Plb3SaFormDetailStatic::find()->where(['plb3_sa_form_id' => $this->id]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3SaFormDetailStaticQuarters() {
        return $this->hasMany(Plb3SaFormDetailStaticQuarter::className(), ['plb3_sa_form_id' => 'id']);
    }
    
    public function getPlb3SaFormDetailByQuestion($questionId) {
        return Plb3SaFormDetail::find()->where(['plb3_sa_form_id' => $this->id, 'plb3_sa_question_id' => $questionId])->one();
    }
}
