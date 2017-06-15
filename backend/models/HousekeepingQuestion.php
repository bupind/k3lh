<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
/**
 * This is the model class for table "housekeeping_question".
 *
 * @property integer $id
 * @property string $hq_title
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HqDetail[] $hqDetails
 */
class HousekeepingQuestion extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'housekeeping_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hq_title'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hq_title'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hq_title' => AppLabels::TITLE,
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

            $housekeepingQuestionId = $this->id;

            if (isset($request['HqDetail'])) {
                foreach ($request['HqDetail'] as $key => $detail) {
                    if (isset($detail['id'])) {
                        $detailTuple = HqDetail::findOne(['id' => $detail['id']]);
                    } else {
                        $detailTuple = new HqDetail();
                        $detailTuple->housekeeping_question_detail_id = $housekeepingQuestionId;
                    }

                    if (!$detailTuple->load(['HqDetail' => $detail]) || !$detailTuple->save()) {
                        $errors = array_merge($errors, $detailTuple->errors);
                        throw new Exception();
                    }
                }
            }
            /*
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
            }*/

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
     * @return \yii\db\ActiveQuery
     */
    public function getHqDetails()
    {
        return $this->hasMany(HqDetail::className(), ['housekeeping_question_detail_id' => 'id']);
    }
}
