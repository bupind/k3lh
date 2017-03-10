<?php

namespace backend\models;

use common\components\helpers\Converter;
use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ppa_pollution_load_decrease".
 *
 * @property integer $id
 * @property integer $ppa_id
 * @property string $ppapld_activity
 * @property string $ppapld_parameter
 * @property string $ppapld_unit
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppa $ppa
 * @property PpaPollutionLoadDecreaseYear[] $ppaPollutionLoadDecreaseYears
 * @property AttachmentOwner $attachmentOwner
 */
class PpaPollutionLoadDecrease extends AppModel {
    
    public $attachment;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_pollution_load_decrease';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_id', 'ppapld_activity'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_id'], 'integer'],
            [['ppapld_activity'], 'string', 'max' => 255],
            [['ppapld_parameter'], 'string', 'max' => 50],
            [['ppapld_unit'], 'string', 'max' => 10],
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
            'ppapld_activity' => AppLabels::PPA_POLL_LOAD_ACTIVITY_TITLE,
            'ppapld_parameter' => AppLabels::PARAM,
            'ppapld_unit' => AppLabels::UNIT,
            'attachment' => AppLabels::PPA_POLL_LOAD_CALC_EVIDENCE_TITLE
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
    
            $ppaPollLoadId = $this->id;
    
            if (isset($request['PpaPollutionLoadDecreaseYear'])) {
                foreach ($request['PpaPollutionLoadDecreaseYear'] as $key => $ppaPollLDYear) {
                    if (isset($ppaPollLDYear['id'])) {
                        $ppaPollLDYearMdl = PpaPollutionLoadDecreaseYear::findOne(['id' => $ppaPollLDYear['id']]);
                    } else {
                        $ppaPollLDYearMdl = new PpaPollutionLoadDecreaseYear();
                        $ppaPollLDYearMdl->ppa_pollution_load_decrease_id = $ppaPollLoadId;
                    }
            
                    if (!$ppaPollLDYearMdl->load(['PpaPollutionLoadDecreaseYear' => $ppaPollLDYear]) || !$ppaPollLDYearMdl->save()) {
                        $errors = array_merge($errors, $ppaPollLDYearMdl->errors);
                        throw new Exception();
                    }
                }
            }
            
            if (isset($request['Attachment'])) {
                $attachmentMdl = new Attachment();
                $attachmentMdl->load($request['Attachment']);
                $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "file");
        
                if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_PPA_POLLUTION_LOAD_DECREASE, $ppaPollLoadId)) {
                    $errors = array_merge($errors, $attachmentMdl->errors);
                    throw new Exception;
                }
            }
                
            $transaction->commit();
            return TRUE;
        } catch (Exception $ex) {
            $transaction->rollBack();
    
            foreach ($errors as $attr => $errorArr) {
                $error = join('<br />', $errorArr);
                Yii::$app->session->addFlash('danger', $error);
            }
    
            return FALSE;
        }
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->attachment = Converter::attachment($this->attachmentOwner);
    }
    
    public function beforeDelete() {
        parent::beforeDelete();
        
        if (!is_null($this->attachmentOwner)) {
            $this->attachmentOwner->attachment->delete();
        }
        
        return true;
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
    public function getPpaPollutionLoadDecreaseYears() {
        return $this->hasMany(PpaPollutionLoadDecreaseYear::className(), ['ppa_pollution_load_decrease_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner() {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_PPA_POLLUTION_LOAD_DECREASE]);
    }
}
