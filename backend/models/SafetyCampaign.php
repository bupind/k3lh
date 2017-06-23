<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "safety_campaign".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $sc_campaign_name
 * @property string $sc_description
 * @property string $sc_date
 * @property string $sc_location
 * @property string $sc_campaigner
 * @property string $sc_part
 * @property integer $sc_amount
 * @property string $sc_result
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner $attachmentOwner
 */
class SafetyCampaign extends AppModel
{
    public $sc_amount_display;
    public $sc_attachment;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'safety_campaign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'sc_campaign_name', 'sc_date', 'sc_campaigner', 'sc_part', 'sc_amount'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'sc_amount'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['sc_description', 'sc_result'], 'string'],
            [['sc_date'], 'safe'],
            [['sc_campaign_name', 'sc_location', 'sc_campaigner', 'sc_part'], 'string', 'max' => 100],
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
            'sc_campaign_name' => AppLabels::SC_CAMPAIGN,
            'sc_description' => AppLabels::DESCRIPTION,
            'sc_date' => AppLabels::DATE,
            'sc_location' => AppLabels::LOCATION,
            'sc_campaigner' => AppLabels::CAMPAIGNER,
            'sc_part' => AppLabels::PART,
            'sc_amount' => AppLabels::AMOUNT,
            'sc_amount_display' => AppLabels::AMOUNT,
            'sc_result' => AppLabels::RESULT,
            'sc_attachment' => AppLabels::DOCUMENTATION,
        ];
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
                    $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "file");

                    if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_SAFETY_CAMPAIGN, $this->id)) {
                        $errors = array_merge($errors, $attachmentMdl->errors);
                        throw new Exception;
                    }
                }
            }
            else{
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
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

        $this->sc_date = Yii::$app->formatter->asDate($this->sc_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        $this->sc_amount_display = $this->sc_amount;

        $this->sc_date = Yii::$app->formatter->asDate($this->sc_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);

        return true;
    }

    public function beforeDelete()
    {
        $attachment = $this->attachmentOwner;
        if(!is_null($attachment)){
            $attachment = $attachment->attachment;
        }
        if(!is_null($attachment)){
            $attachment->delete();
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

    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_SAFETY_CAMPAIGN]);
    }
}
