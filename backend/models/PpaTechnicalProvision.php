<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ppa_technical_provision".
 *
 * @property integer $id
 * @property integer $ppa_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium[] $ppaLaboratoriums
 * @property Ppa $ppa
 * @property PpaTechnicalProvisionDetail[] $ppaTechnicalProvisionDetails
 */
class PpaTechnicalProvision extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_technical_provision';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_id'], 'integer'],
            [['ppa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppa::className(), 'targetAttribute' => ['ppa_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_id' => AppLabels::PPA,
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
            
            $ppaTechProvId = $this->id;
    
            // save laboratorium
            if (isset($request['PpaLaboratorium'])) {
                foreach ($request['PpaLaboratorium'] as $key => $ppaLabor) {
                    if (isset($ppaLabor['id'])) {
                        $ppaLaborMdl = PpaLaboratorium::findOne(['id' => $ppaLabor['id']]);
                    } else {
                        $ppaLaborMdl = new PpaLaboratorium();
                        $ppaLaborMdl->ppa_technical_provision_id = $ppaTechProvId;
                    }
            
                    if ($ppaLaborMdl->load(['PpaLaboratorium' => $ppaLabor]) && $ppaLaborMdl->save()) {
                        
                        $laborId = $ppaLaborMdl->id;
                        
                        // save laboratorium accreditation
                        if (isset($request['PpaLaboratoriumAccreditation'][$key])) {
                            $laborAccrData = $request['PpaLaboratoriumAccreditation'][$key];
                            foreach ($laborAccrData as $keyAccr => $laborAccr) {
                                if (isset($laborAccr['id'])) {
                                    $ppaLaborAccrMdl = PpaLaboratoriumAccreditation::findOne(['id' => $laborAccr['id']]);
                                } else {
                                    $ppaLaborAccrMdl = new PpaLaboratoriumAccreditation();
                                    $ppaLaborAccrMdl->ppa_laboratorium_id = $laborId;
                                }
                                
                                if (!$ppaLaborAccrMdl->load(['PpaLaboratoriumAccreditation' => $laborAccr]) || !$ppaLaborAccrMdl->save()) {
                                    $errors = array_merge($errors, $ppaLaborAccrMdl->errors);
                                    throw new Exception();
                                }
                            }
                        }
                        
                        // save laboratorium test
                        if (isset($request['PpaLaboratoriumTest'][$key])) {
                            $laborTestData = $request['PpaLaboratoriumTest'][$key];
                            foreach ($laborTestData as $keyTest => $laborTest) {
                                if (isset($laborTest['id'])) {
                                    $ppaLaborTestMdl = PpaLaboratoriumTest::findOne(['id' => $laborTest['id']]);
                                    if (!isset($laborTest['test_value'])) $ppaLaborTestMdl->test_value = null;
                                } else {
                                    $ppaLaborTestMdl = new PpaLaboratoriumTest();
                                    $ppaLaborTestMdl->ppa_laboratorium_id = $laborId;
                                }
    
                                if (!$ppaLaborTestMdl->load(['PpaLaboratoriumTest' => $laborTest]) || !$ppaLaborTestMdl->save()) {
                                    $errors = array_merge($errors, $ppaLaborTestMdl->errors);
                                    throw new Exception();
                                }
                            }
                        }
                        
                    } else {
                        $errors = array_merge($errors, $ppaLaborMdl->errors);
                        throw new Exception();
                    }
                }
            }
            
            // save detail
            if ($request['PpaTechnicalProvisionDetail']) {
                foreach ($request['PpaTechnicalProvisionDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailMdl = PpaTechnicalProvisionDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailMdl = new PpaTechnicalProvisionDetail();
                        $detailMdl->ppa_technical_provision_id = $ppaTechProvId;
                    }
    
                    if ($detailMdl->load(['PpaTechnicalProvisionDetail' => $detail]) && $detailMdl->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();
                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->files = UploadedFile::getInstances($attachmentMdl, "[$key]files");
                                    
                            if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_PPA_TECH_PROVISION, $detailMdl->id)) {
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
    public function getPpaLaboratoriums() {
        return $this->hasMany(PpaLaboratorium::className(), ['ppa_technical_provision_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpa() {
        return $this->hasOne(Ppa::className(), ['id' => 'ppa_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaTechnicalProvisionDetails() {
        return $this->hasMany(PpaTechnicalProvisionDetail::className(), ['ppa_technical_provision_id' => 'id']);
    }
}
