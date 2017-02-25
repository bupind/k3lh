<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use common\vendor\AppConstants;
use yii\base\Exception;
use yii\web\UploadedFile;


/**
 * This is the model class for table "ppu_technical_provision".
 *
 * @property integer $id
 * @property integer $ppu_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Ppu $ppu
 * @property PpuTechnicalProvisionDetail[] $ppuTechnicalProvisionDetails

 */
class PpuTechnicalProvision extends AppModel
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppu_technical_provision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppu_id'], 'required'],
            [['ppu_id'], 'integer'],
            [['ppu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppu::className(), 'targetAttribute' => ['ppu_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppu_id' => AppLabels::PPU,
            'pputp_attachment_owner' => AppLabels::UNMONITORED_EVIDENCE,
        ];
    }
    public function saveTransactional()
    {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if ($this->save()) {

                $techProvDetailId = $this->id;

                if (isset($request['PpuTechnicalProvisionDetail'])) {

                    foreach ($request['PpuTechnicalProvisionDetail'] as $key => $provDetail) {
                        if (isset($provDetail['id'])) {
                            $provDetailTuple = PpuTechnicalProvisionDetail::findOne(['id' => $provDetail['id']]);

                        } else {
                            $provDetailTuple = new PpuTechnicalProvisionDetail();
                            $provDetailTuple->ppu_technical_provision_id = $techProvDetailId;
                        }

                        if ($provDetailTuple->load(['PpuTechnicalProvisionDetail' => $provDetail]) && $provDetailTuple->save()) {
                            if (isset($request['Attachment'][$key])) {
                                $attachmentMdl = new Attachment();

                                $attachmentMdl->load($request['Attachment'][$key]);
                                $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");

                                if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_PPU_TECHNICAL_PROVISION, $provDetailTuple->id)) {
                                    $errors = array_merge($errors, $attachmentMdl->errors);
                                    throw new Exception;
                                }
                            }
                        }else {
                            $errors = array_merge($errors, $provDetailTuple->errors);
                            throw new Exception();
                        }


                    }
                }



            }else{
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
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
    public function getPpu()
    {
        return $this->hasOne(Ppu::className(), ['id' => 'ppu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpuTechnicalProvisionDetails()
    {
        return $this->hasMany(PpuTechnicalProvisionDetail::className(), ['ppu_technical_provision_id' => 'id']);
    }


}
