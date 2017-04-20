<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "plb3_checklist_detail".
 *
 * @property integer $id
 * @property integer $plb3_checklist_id
 * @property string $plb3cd_form_type_code
 * @property string $plb3cd_company_name
 * @property string $plb3cd_industrial_sector
 * @property string $plb3cd_location
 * @property string $plb3cd_assessment_team
 * @property string $plb3cd_assessment_date
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Plb3ChecklistAnswer[] $plb3ChecklistAnswers
 * @property Plb3Checklist $plb3Checklist
 * @property Plb3ChecklistAnswer $plb3ChecklistAnswerByQuestion
 */
class Plb3ChecklistDetail extends AppModel
{
    public $plb3cd_form_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plb3_checklist_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_checklist_id', 'plb3cd_form_type_code', 'plb3cd_company_name', 'plb3cd_industrial_sector', 'plb3cd_location'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_checklist_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['plb3cd_assessment_date'], 'safe'],
            [['plb3cd_form_type_code'], 'string', 'max' => 10],
            [['plb3cd_company_name', 'plb3cd_industrial_sector'], 'string', 'max' => 100],
            [['plb3cd_location', 'plb3cd_assessment_team'], 'string', 'max' => 50],
            [['plb3_checklist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plb3Checklist::className(), 'targetAttribute' => ['plb3_checklist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_checklist_id' => AppLabels::CHECKLIST,
            'plb3cd_form_type_code' => AppLabels::FORM_TYPE,
            'plb3cd_company_name' => AppLabels::COMPANY,
            'plb3cd_industrial_sector' => AppLabels::INDUSTRIAL_SECTOR,
            'plb3cd_location' => AppLabels::LOCATION,
            'plb3cd_assessment_team' => AppLabels::ASSESSMENT_TEAM,
            'plb3cd_assessment_date' => AppLabels::ASSESSMENT_DATE,
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

            $plb3ChecklistDetailId = $this->id;

            if (isset($request['Plb3ChecklistAnswer'])) {
                foreach ($request['Plb3ChecklistAnswer'] as $keyA => $plb3Answer) {
                    if (isset($plb3Answer['id'])) {
                        $plb3AnswerTuple = Plb3ChecklistAnswer::findOne(['id' => $plb3Answer['id']]);

                    } else {
                        $plb3AnswerTuple = new Plb3ChecklistAnswer();
                        $plb3AnswerTuple->plb3_checklist_detail_id = $plb3ChecklistDetailId;
                    }
                    if ($plb3AnswerTuple->load(['Plb3ChecklistAnswer' => $plb3Answer]) && $plb3AnswerTuple->save()) {
                        if (isset($request['Attachment'][$keyA])) {
                            $attachmentMdl = new Attachment();

                            $attachmentMdl->load($request['Attachment'][$keyA]);
                            $attachmentMdl->file = UploadedFile::getInstance($attachmentMdl, "[$keyA]file");

                            if (!is_null($attachmentMdl->file) && !$attachmentMdl->saveAttachment(AppConstants::MODULE_CODE_PLB3_CHECKLIST, $plb3AnswerTuple->id)) {
                                $errors = array_merge($errors, $attachmentMdl->errors);
                                throw new Exception;
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $plb3AnswerTuple->errors);
                        throw new Exception();
                    }
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

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        $this->plb3cd_assessment_date = \Yii::$app->formatter->asDate($this->plb3cd_assessment_date, AppConstants::FORMAT_DB_DATE_PHP);

        return true;
    }
    public function afterFind()
    {
        parent::afterFind();

        $this->plb3cd_form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE, $this->plb3cd_form_type_code);
        $this->plb3cd_assessment_date = \Yii::$app->formatter->asDate($this->plb3cd_assessment_date);

        return true;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlb3ChecklistAnswers()
    {
        return $this->hasMany(Plb3ChecklistAnswer::className(), ['plb3_checklist_detail_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
*/
    public function getPlb3Checklist()
    {
        return $this->hasOne(Plb3Checklist::className(), ['id' => 'plb3_checklist_id']);
    }

    public function getPlb3ChecklistAnswerByQuestion($questionId){
        return Plb3ChecklistAnswer::find()->where(['plb3_checklist_detail_id' => $this->id, 'plb3_question_id' => $questionId])->one();
    }


}
