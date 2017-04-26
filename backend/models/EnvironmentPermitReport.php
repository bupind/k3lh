<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\web\UploadedFile;
use yii\base\Exception;

/**
 * This is the model class for table "environment_permit_report".
 *
 * @property integer $id
 * @property integer $environment_permit_id
 * @property string $ep_quarter
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property EnvironmentPermit $environmentPermit
 * @property EnvironmentPermitDistrict[] $environmentPermitDistricts
 * @property EnvironmentPermitProvince[] $environmentPermitProvinces
 * @property EnvironmentPermitMinistry[] $environmentPermitMinistrys
 */
class EnvironmentPermitReport extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'environment_permit_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['environment_permit_id', 'ep_quarter'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['environment_permit_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ep_quarter'], 'string', 'max' => 20],
            [['environment_permit_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnvironmentPermit::className(), 'targetAttribute' => ['environment_permit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'environment_permit_id' => AppLabels::ENVIRONMENT_PERMIT,
            'ep_quarter' => AppLabels::QUARTER,
        ];
    }

    public function beforeDelete()
    {
        $epDetail = $this->environmentPermitDistricts;
        foreach($epDetail as $keyD => $detail){
            $attachment = $detail->attachmentOwner;
            if (!is_null($attachment)) {
                $attachment = $attachment->attachment;
            }
            if (!is_null($attachment)) {
                $attachment->delete();
            }
        }

        $epDetail = $this->environmentPermitProvinces;
        foreach($epDetail as $keyD => $detail){
            $attachment = $detail->attachmentOwner;
            if (!is_null($attachment)) {
                $attachment = $attachment->attachment;
            }
            if (!is_null($attachment)) {
                $attachment->delete();
            }
        }

        $epDetail = $this->environmentPermitMinistrys;
        foreach($epDetail as $keyD => $detail){
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

            $environmentPermitReportId = $this->id;

            if (isset($request['EnvironmentPermitDistrict'])) {
                foreach ($request['EnvironmentPermitDistrict'] as $keyD => $district) {
                    if (isset($district['id'])) {
                        $districtTuple = EnvironmentPermitDistrict::findOne(['id' => $district['id']]);

                    } else {
                        $districtTuple = new EnvironmentPermitDistrict();
                        $districtTuple->environment_permit_report_id = $environmentPermitReportId;
                    }
                    if ($districtTuple->load(['EnvironmentPermitDistrict' => $district]) && $districtTuple->save()) {
                        $index = $request['EnvironmentPermitDistrict'][$keyD]['index'];
                        if (isset($request['Attachment'][$index])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$index]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$index]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_ENVIRONMENT_PERMIT_DISTRICT, $districtTuple->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $districtTuple->errors);
                        throw new Exception();
                    }
                }
            }

            if (isset($request['EnvironmentPermitProvince'])) {
                foreach ($request['EnvironmentPermitProvince'] as $keyP => $province) {
                    if (isset($province['id'])) {
                        $provinceTuple = EnvironmentPermitProvince::findOne(['id' => $province['id']]);

                    } else {
                        $provinceTuple = new EnvironmentPermitProvince();
                        $provinceTuple->environment_permit_report_id = $environmentPermitReportId;
                    }
                    if ($provinceTuple->load(['EnvironmentPermitProvince' => $province]) && $provinceTuple->save()) {
                        $index = $request['EnvironmentPermitProvince'][$keyP]['index'];
                        if (isset($request['Attachment'][$index])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$index]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$index]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_ENVIRONMENT_PERMIT_PROVINCE, $provinceTuple->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $provinceTuple->errors);
                        throw new Exception();
                    }
                }
            }

            if (isset($request['EnvironmentPermitMinistry'])) {
                foreach ($request['EnvironmentPermitMinistry'] as $keyM => $ministry) {
                    if (isset($ministry['id'])) {
                        $ministryTuple = EnvironmentPermitMinistry::findOne(['id' => $ministry['id']]);

                    } else {
                        $ministryTuple = new EnvironmentPermitMinistry();
                        $ministryTuple->environment_permit_report_id = $environmentPermitReportId;
                    }
                    if ($ministryTuple->load(['EnvironmentPermitMinistry' => $ministry]) && $ministryTuple->save()) {
                        $index = $request['EnvironmentPermitMinistry'][$keyM]['index'];
                        if (isset($request['Attachment'][$index])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$index]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$index]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_ENVIRONMENT_PERMIT_MINISTRY, $ministryTuple->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $ministryTuple->errors);
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermit()
    {
        return $this->hasOne(EnvironmentPermit::className(), ['id' => 'environment_permit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermitDistricts()
    {
        return $this->hasMany(EnvironmentPermitDistrict::className(), ['environment_permit_report_id' =>  'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermitProvinces()
    {
        return $this->hasMany(EnvironmentPermitProvince::className(), ['environment_permit_report_id' =>  'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvironmentPermitMinistrys()
    {
        return $this->hasMany(EnvironmentPermitMinistry::className(), ['environment_permit_report_id' =>  'id']);
    }

}
