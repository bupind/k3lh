<?php

namespace backend\models;

use Yii;
use yii\base\Exception;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "plb3_question".
 *
 * @property integer $id
 * @property string $plb3_form_type_code
 * @property string $plb3_question_type_code
 * @property string $plb3_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Plb3Question extends AppModel
{
    public $plb3_question_type_code_desc;
    public $plb3_form_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plb3_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plb3_form_type_code', 'plb3_question_type_code', 'plb3_question'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['plb3_form_type_code', 'plb3_question_type_code'], 'string', 'max' => 10],
            [['plb3_question'], 'string', 'max' => 255],
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

            $plb3ChecklistDetails = Plb3ChecklistDetail::find()->select(['id'])->where(['plb3cd_form_type_code' => $this->plb3_form_type_code])->all();

            foreach($plb3ChecklistDetails as $key => $plb3Detail) {
                $plb3Answer = new Plb3ChecklistAnswer();
                $plb3Answer->plb3_checklist_detail_id = $plb3Detail->id;
                $plb3Answer->plb3_question_id = $this->id;
                $plb3Answer->plb3ca_answer = 0;
                if (!$plb3Answer->save()) {
                    $errors = array_merge($errors, $plb3Answer->errors);
                    throw new Exception();
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

    public function findQuestion($id){
        $question = Plb3Question::find()->where(['id' => $id])->one();

        return $question->plb3_question;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plb3_form_type_code' => AppLabels::FORM_TYPE,
            'plb3_question_type_code' => AppLabels::CATEGORY,
            'plb3_question' => AppLabels::QUESTION,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->plb3_form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE, $this->plb3_form_type_code);
        $this->plb3_question_type_code_desc = Codeset::getCodesetValue(sprintf("%s_%s", 'PLB3_QUESTION_TYPE_CODE', $this->plb3_form_type_code), $this->plb3_question_type_code);

        return true;
    }
}
