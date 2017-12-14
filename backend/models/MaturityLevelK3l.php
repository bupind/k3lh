<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;
use yii\web\UploadedFile;
use yii\base\Exception;

/**
 * This is the model class for table "maturity_level_k3l".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $mlvl_quarter
 * @property integer $mlvl_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property MaturityLevelK3lDetail $maturityLevelK3lDetails
 * @property Sector $sector
 */
class MaturityLevelK3l extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maturity_level_k3l';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector_id', 'power_plant_id', 'mlvl_quarter', 'mlvl_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'mlvl_year'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['mlvl_quarter'], 'string', 'max' => 2],
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
            'mlvl_quarter' => AppLabels::QUARTER,
            'mlvl_year' => AppLabels::YEAR,
        ];
    }

    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);
            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $maturityLevelK3lId = $this->id;

            foreach ($request['MaturityLevelK3lDetail'] as $key => $detail) {
                if (isset($detail['id'])) {
                    $detailMdl = MaturityLevelK3lDetail::findOne(['id' => $detail['id']]);
                } else {

                    $detailMdl = new MaturityLevelK3lDetail();
                    $detailMdl->maturity_level_k3l_id = $maturityLevelK3lId;
                }


                if ($detailMdl->load(['MaturityLevelK3lDetail' => $detail]) && $detailMdl->save()) {
                    if (isset($request['Attachment'][$key])) {
                        $attachmentMdl = new Attachment();
                        $attachmentMdl->load($request['Attachment'][$key]);
                        $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$key]file");

                        if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_MATURITY_LEVEL_K3L, $detailMdl->id)) {
                            $errors = array_merge($errors, $attachmentMdl->errors);
                            throw new Exception;
                        }
                    }
                } else {
                    $errors = array_merge($errors, $detailMdl->errors);
                    throw new Exception();
                }
            }

            $transaction->commit();
            return TRUE;
        } catch (Exception $ex) {
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
    public function getMaturityLevelK3lDetails() {
        return $this->hasMany(MaturityLevelK3lDetail::className(), ['maturity_level_k3l_id' => 'id']);
    }
}
