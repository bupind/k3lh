<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "hydrant_question".
 *
 * @property integer $id
 * @property string $hq_question
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HcDetail[] $hcDetails
 */
class HydrantQuestion extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hydrant_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hq_question'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hq_question'], 'string'],
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

            $hydrantChecklist = HydrantChecklist::find()->select(['id'])->all();

            foreach($hydrantChecklist as $key => $checklist) {
                $hcDetail = new HcDetail();
                $hcDetail->hydrant_checklist_id = $checklist->id;
                $hcDetail->hydrant_question_id = $this->id;
                $hcDetail->hcd_answer = 2;
                if (!$hcDetail->save()) {
                    $errors = array_merge($errors, $hcDetail->errors);
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hq_question' => AppLabels::ITEM,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHcDetails()
    {
        return $this->hasMany(HcDetail::className(), ['hydrant_question_id' => 'id']);
    }
}
