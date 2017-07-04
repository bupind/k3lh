<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\web\UploadedFile;
use yii\base\Exception;


/**
 * This is the model class for table "competency_certification".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $cc_name
 * @property string $cc_position
 * @property string $cc_type
 * @property string $cc_number
 * @property string $cc_date
 * @property string $cc_certificate_publisher
 * @property string $cc_pjk3
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner[] $attachmentOwners
 */
class CompetencyCertification extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competency_certification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'cc_name', 'cc_position', 'cc_type', 'cc_number', 'cc_date', 'cc_certificate_publisher', 'cc_pjk3'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['cc_date'], 'safe'],
            [['cc_name', 'cc_position', 'cc_type', 'cc_number', 'cc_certificate_publisher', 'cc_pjk3'], 'string', 'max' => 100],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
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

                    if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_COMPETENCY_CERTIFICATION, $this->id)) {
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'cc_name' => AppLabels::NAME,
            'cc_position' => AppLabels::CC_POSITION,
            'cc_type' => AppLabels::CC_TYPE,
            'cc_number' => AppLabels::NUMBER,
            'cc_date' => AppLabels::DATE,
            'cc_certificate_publisher' => AppLabels::CC_CERTIFICATE_PUBLISHER,
            'cc_pjk3' => AppLabels::PJK3,
            'files' => AppLabels::FILES,
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->cc_date == '') {
            $this->cc_date = Yii::$app->formatter->asDate($this->cc_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        if(!$this->cc_date == '') {
            $this->cc_date = Yii::$app->formatter->asDate($this->cc_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
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
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_COMPETENCY_CERTIFICATION]);
    }
}
