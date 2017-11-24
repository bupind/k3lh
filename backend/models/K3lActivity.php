<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use common\vendor\AppConstants;
use yii\web\UploadedFile;
use yii\base\Exception;
/**
 * This is the model class for table "k3l_activity".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $ka_name
 * @property string $ka_description
 * @property string $ka_date
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property AttachmentOwner $attachmentOwner
 */
class K3lActivity extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'k3l_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ka_name', 'ka_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ka_description'], 'string'],
            [['ka_date'], 'safe'],
            [['ka_name'], 'string', 'max' => 100],
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
            'ka_name' => sprintf("%s %s",AppLabels::NAME, AppLabels::ACTIVITY),
            'ka_description' => sprintf("Deskripsi %s", AppLabels::ACTIVITY),
            'ka_date' => sprintf("%s %s",AppLabels::DATE, AppLabels::ACTIVITY),
            'attachment_owner' => "Upload Laporan",
        ];
    }

    public function saveTransactional()
    {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            if (isset($request['Attachment'])) {
                $attachmentMdl = new Attachment();

                $attachmentMdl->load($request['Attachment']);
                $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "file");

                if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_K3L_ACTIVITY, $this->id)) {
                    $errors = array_merge($errors, $attachmentMdl->errors);
                    throw new Exception;
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

    public function toAlphabet($number){
        $alphabet = range('A', 'Z');

        return ($alphabet[$number]);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->ka_date == '') {
            $this->ka_date = Yii::$app->formatter->asDate($this->ka_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->ka_date == '') {
            $this->ka_date = Yii::$app->formatter->asDate($this->ka_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

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
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwner()
    {
        return $this->hasOne(AttachmentOwner::className(), ['atfo_module_pk' => 'id'])->andOnCondition(['atfo_module_code' => AppConstants::MODULE_CODE_K3L_ACTIVITY]);
    }
}
