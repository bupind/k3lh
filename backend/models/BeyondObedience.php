<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;
/**
 * This is the model class for table "beyond_obedience".
 *
 * @property integer $id
 * @property string $bo_form_type_code
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $bo_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property BoAssessment[] $boAssessments
 * @property AttachmentOwner[] $attachmentOwners
 */
class BeyondObedience extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beyond_obedience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bo_form_type_code', 'sector_id', 'power_plant_id', 'bo_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'bo_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['bo_form_type_code'], 'string', 'max' => 10],
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
            'bo_form_type_code' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'bo_year' => AppLabels::YEAR,
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

                    if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_BEYOND_OBEDIENCE, $this->id)) {
                        $errors = array_merge($errors, [[AppConstants::ERR_UPLOAD_FAILED]]);
                        throw new Exception;
                    }
                } else {
                    $errors = array_merge($errors, $this->errors);
                    throw new Exception();
                }
            }

            $boId = $this->id;

            if (isset($request['BoAssessment'])) {
                foreach ($request['BoAssessment'] as $keyC => $assessment) {
                    if (isset($assessment['id'])) {
                        $boAssessmentTuple = BoAssessment::findOne(['id' => $assessment['id']]);

                    } else {
                        $boAssessmentTuple = new BoAssessment();
                        $boAssessmentTuple->beyond_obedience_id = $boId;
                    }
                    if (!$boAssessmentTuple->load(['BoAssessment' => $assessment]) || !$boAssessmentTuple->save()) {
                        $errors = array_merge($errors, $boAssessmentTuple->errors);
                        throw new Exception();
                    }
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

    public function beforeDelete()
    {
        $attachments = $this->attachmentOwners;
        foreach($attachments as $keyA => $attachment) {
            if (!is_null($attachment)) {
                $attachment = $attachment->attachment;
            }

            if (!is_null($attachment)) {
                $attachment->delete();
            }
        }
        return parent::beforeDelete();
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
    public function getBoAssessments()
    {
        return $this->hasMany(BoAssessment::className(), ['beyond_obedience_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_BEYOND_OBEDIENCE]);
    }
}
