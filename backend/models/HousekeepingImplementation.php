<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "housekeeping_implementation".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $hi_unit
 * @property string $hi_date
 * @property string $hi_auditor
 * @property string $hi_auditee
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HiDetail[] $hiDetails
 * @property PowerPlant $powerPlant
 * @property AttachmentOwner[] $attachmentOwners
 * @property Sector $sector
 */
class HousekeepingImplementation extends AppModel
{
    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'housekeeping_implementation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'hi_unit', 'hi_date', 'hi_auditor', 'hi_auditee'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['hi_date'], 'safe'],
            [['hi_unit', 'hi_auditor', 'hi_auditee'], 'string', 'max' => 150],
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
            'hi_unit' => AppLabels::HI_UNIT,
            'hi_date' => AppLabels::DATE,
            'hi_auditor' => AppLabels::AUDITOR,
            'hi_auditee' => AppLabels::AUDITEE,
            'files' => AppLabels::FILES,
        ];
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

                    if (!empty($attachmentMdl->files) && !$attachmentMdl->saveMultipleAttachments(AppConstants::MODULE_CODE_HOUSEKEEPING_IMPLEMENTATION, $this->id)) {
                        $errors = array_merge($errors, [[AppConstants::ERR_UPLOAD_FAILED]]);
                        throw new Exception;
                    }
                }
            }else {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $hiId = $this->id;

            if (isset($request['HiDetail'])) {
                foreach ($request['HiDetail'] as $keyD => $detail) {
                    if (isset($detail['id'])) {
                        $hiDetailTuple = HiDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $hiDetailTuple = new HiDetail();
                        $hiDetailTuple->housekeeping_implementation_id = $hiId;
                    }
                    if (!$hiDetailTuple->load(['HiDetail' => $detail]) || !$hiDetailTuple->save()) {
                        $errors = array_merge($errors, $hiDetailTuple->errors);
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

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->hi_date == '') {
            $this->hi_date = Yii::$app->formatter->asDate($this->hi_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->hi_date == '') {
            $this->hi_date = Yii::$app->formatter->asDate($this->hi_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHiDetails()
    {
        return $this->hasMany(HiDetail::className(), ['housekeeping_implementation_id' => 'id']);
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

    public function getHiDetailByQuestion($detailId){
        return HiDetail::find()->where(['housekeeping_implementation_id' => $this->id, 'hq_detail_id' => $detailId])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_HOUSEKEEPING_IMPLEMENTATION]);
    }
}
