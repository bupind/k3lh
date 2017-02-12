<?php

namespace backend\models;

use Yii;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "environment_permit".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $ep_year
 * @property string $ep_quarter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property EnvironmentPermitDetail[] $environmentPermitDetails
 */
class EnvironmentPermit extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'ep_year', 'ep_quarter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'ep_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ep_quarter'], 'string', 'max' => 2],
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
            'ep_year' => AppLabels::YEAR,
            'ep_quarter' => AppLabels::QUARTER,
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

            $environmentPermitId = $this->id;

            if (isset($request['EnvironmentPermitDetail'])) {
                foreach ($request['EnvironmentPermitDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailTuple = EnvironmentPermitDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailTuple = new EnvironmentPermitDetail();
                        $detailTuple->environment_permit_id = $environmentPermitId;
                    }

                    if ($detailTuple->load(['EnvironmentPermitDetail' => $detail]) && $detailTuple->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_ENVIRONMENT_PERMIT, $detailTuple->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }

                    }else{
                        $errors = array_merge($errors, $detailTuple->errors);
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

    public function beforeDelete()
    {
        foreach($this->environmentPermitDetails as $key => $detail) :

            $attachment = $detail->attachmentOwner;
            $attachment->delete();

        endforeach;
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
    public function getEnvironmentPermitDetails()
    {
        return $this->hasMany(EnvironmentPermitDetail::className(), ['environment_permit_id' => 'id']);
    }

}
