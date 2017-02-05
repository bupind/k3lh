<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "smk3_title".
 *
 * @property integer $id
 * @property string $sttl_title
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property Smk3Subtitle[] $smk3Subtitles
 */
class Smk3Title extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk3_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sttl_title'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sttl_title'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sttl_title' => AppLabels::SMK3_TITLE,
        ];
    }

    public function saveTransactional() {
        $request = Yii::$app->request->post();
        d($request);
        exit;
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];

        try {
            $this->load($request);

            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }

            $smk3TitleId = $this->id;

            if (isset($request['Smk3Subtitle'])) {
                foreach ($request['Smk3Subtitle'] as $key => $subtitle) {
                    if (isset($subtitle['id'])) {
                        $subtitleTuple = Smk3Subtitle::findOne(['id' => $subtitle['id']]);
                    } else {
                        $subtitleTuple = new Smk3Subtitle();
                        $subtitleTuple->smk3_title_id = $smk3TitleId;
                    }

                    if (!$subtitleTuple->load(['Smk3Subtitle' => $subtitle]) || !$subtitleTuple->save()) {
                        $errors = array_merge($errors, $subtitleTuple->errors);
                        throw new Exception();
                    }

                    if (isset($request['Smk3Criteria'][$key])) {
                        foreach ($request['Smk3Criteria'][$key] as $key2 => $criteria) {
                            if (isset($criteria['id'])) {
                                $criteriaTuple = Smk3Criteria::findOne(['id' => $criteria['id']]);
                            } else {
                                $criteriaTuple = new Smk3Criteria();
                                $criteriaTuple->smk3_subtitle_id = $subtitleTuple->id;
                            }

                            if (!$criteriaTuple->load(['Smk3Criteria' => $criteria]) || !$criteriaTuple->save()) {
                                $errors = array_merge($errors, $criteriaTuple->errors);
                                throw new Exception();
                            }
                        }
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
    public function getSmk3Subtitles()
    {
        return $this->hasMany(Smk3Subtitle::className(), ['smk3_title_id' => 'id']);
    }
}
