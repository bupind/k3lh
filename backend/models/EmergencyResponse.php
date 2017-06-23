<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use common\vendor\AppConstants;
use yii\base\Exception;
use yii\web\UploadedFile;
/**
 * This is the model class for table "emergency_response".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $er_training_name
 * @property integer $er_participant
 * @property string $er_team
 * @property integer $er_simulation_time
 * @property integer $er_simulation_victim
 * @property integer $er_simulation_loss
 * @property string $er_location
 * @property string $er_date
 * @property integer $er_evaluation_time
 * @property integer $er_evaluation_victim
 * @property integer $er_evaluation_loss
 * @property string $er_failure_detail
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner $attachmentOwner
 */
class EmergencyResponse extends AppModel
{
    public $er_simulation_time_display;
    public $er_simulation_victim_display;
    public $er_simulation_loss_display;
    public $er_evaluation_time_display;
    public $er_evaluation_victim_display;
    public $er_evaluation_loss_display;
    public $er_participant_display;
    public $er_attachment_owner;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emergency_response';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'er_training_name', 'er_participant', 'er_team', 'er_simulation_time', 'er_simulation_victim', 'er_simulation_loss', 'er_location', 'er_date', 'er_evaluation_time', 'er_evaluation_victim', 'er_evaluation_loss', 'er_failure_detail'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'er_participant', 'er_simulation_time', 'er_simulation_victim', 'er_simulation_loss', 'er_evaluation_time', 'er_evaluation_victim', 'er_evaluation_loss'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['er_date'], 'safe'],
            [['er_failure_detail'], 'string'],
            [['er_training_name'], 'string', 'max' => 255],
            [['er_team', 'er_location'], 'string', 'max' => 100],
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
            'er_training_name' => AppLabels::ER_TRAINING_NAME,
            'er_participant' => sprintf("%s %s",AppLabels::AMOUNT, AppLabels::PARTICIPANT),
            'er_participant_display' => sprintf("%s %s",AppLabels::AMOUNT, AppLabels::PARTICIPANT),
            'er_team' => AppLabels::ER_TEAM,
            'er_simulation_time' => AppLabels::ER_TIME,
            'er_simulation_victim' => AppLabels::ER_VICTIM,
            'er_simulation_loss' => AppLabels::ER_LOSS,
            'er_simulation_time_display' => AppLabels::ER_TIME,
            'er_simulation_victim_display' => AppLabels::ER_VICTIM,
            'er_simulation_loss_display' => AppLabels::ER_LOSS,
            'er_location' => AppLabels::LOCATION,
            'er_date' => AppLabels::DATE,
            'er_evaluation_time' => AppLabels::ER_TIME,
            'er_evaluation_victim' => AppLabels::ER_VICTIM,
            'er_evaluation_loss' => AppLabels::ER_LOSS,
            'er_evaluation_time_display' => AppLabels::ER_TIME,
            'er_evaluation_victim_display' => AppLabels::ER_VICTIM,
            'er_evaluation_loss_display' => AppLabels::ER_LOSS,
            'er_failure_detail' => AppLabels::ER_FAILURE_DETAIL,
            'er_attachment_owner' => AppLabels::ER_UPLOAD,
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

                    if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_EMERGENCY_RESPONSE, $this->id)) {
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

        $this->er_date = Yii::$app->formatter->asDate($this->er_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        $this->er_simulation_time_display = $this->er_simulation_time;
        $this->er_simulation_victim_display = $this->er_simulation_victim;
        $this->er_simulation_loss_display = $this->er_simulation_loss;
        $this->er_evaluation_time_display = $this->er_evaluation_time;
        $this->er_evaluation_victim_display = $this->er_evaluation_victim;
        $this->er_evaluation_loss_display = $this->er_evaluation_loss;
        $this->er_participant_display = $this->er_participant;

        $this->er_date = Yii::$app->formatter->asDate($this->er_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);

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
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_EMERGENCY_RESPONSE]);
    }
}
