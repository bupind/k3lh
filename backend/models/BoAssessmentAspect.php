<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;
/**
 * This is the model class for table "bo_assessment_aspect".
 *
 * @property integer $id
 * @property string $bo_form_type_code
 * @property string $boas_aspect
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property BoasCriteria[] $boasCriterias
 */
class BoAssessmentAspect extends AppModel
{
    public $bo_form_type_code_desc;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bo_assessment_aspect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bo_form_type_code', 'boas_aspect'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['bo_form_type_code'], 'string', 'max' => 10],
            [['boas_aspect'], 'string'],
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

            $boAssessmentAspectId = $this->id;

            if (isset($request['BoasCriteria'])) {
                foreach ($request['BoasCriteria'] as $keyC => $criteria) {
                    if (isset($criteria['id'])) {
                        $boCriteriaTuple = BoasCriteria::findOne(['id' => $criteria['id']]);

                    } else {
                        $boCriteriaTuple = new BoasCriteria();
                        $boCriteriaTuple->bo_assessment_aspect_id = $boAssessmentAspectId;
                    }
                    if ($boCriteriaTuple->load(['BoasCriteria' => $criteria]) && $boCriteriaTuple->save()) {
                        if (!isset($criteria['id'])) {
                            $beyondObediences = BeyondObedience::find()->select(['id'])->where(['bo_form_type_code' => $this->bo_form_type_code])->all();

                            foreach($beyondObediences as $key => $bo) {
                                $boAssessment = new BoAssessment();
                                $boAssessment->beyond_obedience_id = $bo->id;
                                $boAssessment->boas_criteria_id = $boCriteriaTuple->id;
                                $boAssessment->boa_value = 0;
                                if (!$boAssessment->save()) {
                                    $errors = array_merge($errors, $boAssessment->errors);
                                    throw new Exception();
                                }
                            }
                        }
                    }else{
                        $errors = array_merge($errors, $boCriteriaTuple->errors);
                        throw new Exception();
                    }
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
            'bo_form_type_code' => AppLabels::FORM_TYPE,
            'boas_aspect' => AppLabels::ASSESSMENT_ASPECT,
        ];
    }

    public function afterFind() {
        parent::afterFind();

        $this->bo_form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE, $this->bo_form_type_code);

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoasCriterias()
    {
        return $this->hasMany(BoasCriteria::className(), ['bo_assessment_aspect_id' => 'id']);
    }
}
