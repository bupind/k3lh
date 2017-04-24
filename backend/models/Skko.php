<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;
/**
 * This is the model class for table "skko".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property integer $skko_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property SkkoDetail[] $skkoDetails
 */
class Skko extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'skko_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'skko_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
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
            'skko_year' => AppLabels::YEAR,
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

            $skkoId = $this->id;

            if (isset($request['SkkoDetail'])) {
                foreach ($request['SkkoDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailTuple = SkkoDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailTuple = new SkkoDetail();
                        $detailTuple->skko_id = $skkoId;
                    }

                    if ($detailTuple->load(['SkkoDetail' => $detail]) && $detailTuple->save()) {
                        if (isset($request['Attachment'][$key])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$key]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_SKKO_DOCUMENT, $detailTuple->id)) {
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
        $skkoDetail = $this->skkoDetails;
        foreach($skkoDetail as $keyD => $detail){
            $attachment = $detail->attachmentOwner;
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
    public function getSkkoDetails()
    {
        return $this->hasMany(SkkoDetail::className(), ['skko_id' => 'id']);
    }
}
