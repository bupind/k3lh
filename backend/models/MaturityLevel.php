<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "maturity_level".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property string $mlvl_quarter
 * @property integer $mlvl_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Sector $sector
 * @property MaturityLevelDetail[] $maturityLevelDetails
 */
class MaturityLevel extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'maturity_level';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'mlvl_quarter', 'mlvl_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'mlvl_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['mlvl_quarter'], 'string', 'max' => 2],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'mlvl_quarter' => AppLabels::QUARTER,
            'mlvl_year' => AppLabels::YEAR,
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
    
            $maturityLevelId = $this->id;
            
            foreach ($request['MaturityLevelDetail'] as $key => $detail) {
                if (isset($detail['id'])) {
                    $detailMdl = MaturityLevelDetail::findOne(['id' => $detail['id']]);
                } else {

                    $detailMdl = new MaturityLevelDetail();
                    $detailMdl->maturity_level_id = $maturityLevelId;
                }

        
                if ($detailMdl->load(['MaturityLevelDetail' => $detail]) && $detailMdl->save()) {
                    if (isset($request['Attachment'][$key])) {
                        $attachmentMdl = new Attachment();
                        $attachmentMdl->load($request['Attachment'][$key]);
                        $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");
        
                        if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_MATURITY_LEVEL, $detailMdl->id)) {
                            $errors = array_merge($errors, $attachmentMdl->errors);
                            throw new Exception;
                        }
                    }
                } else {
                    $errors = array_merge($errors, $detailMdl->errors);
                    throw new Exception();
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaturityLevelDetails() {
        return $this->hasMany(MaturityLevelDetail::className(), ['maturity_level_id' => 'id']);
    }
}
