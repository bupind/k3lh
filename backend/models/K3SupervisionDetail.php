<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/**
 * This is the model class for table "k3_supervision_detail".
 *
 * @property integer $id
 * @property integer $k3_supervision_id
 * @property string $ksd_date
 * @property string $ksd_finding
 * @property string $ksd_officer_action
 * @property string $ksd_response
 * @property string $ksd_finding_desc
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property K3Supervision $k3Supervision
 */
class K3SupervisionDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'k3_supervision_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['k3_supervision_id', 'ksd_date'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['k3_supervision_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['ksd_date'], 'safe'],
            [['ksd_finding_desc'], 'string'],
            [['ksd_finding'], 'string', 'max' => 50],
            [['ksd_officer_action', 'ksd_response'], 'string', 'max' => 100],
            [['k3_supervision_id'], 'exist', 'skipOnError' => true, 'targetClass' => K3Supervision::className(), 'targetAttribute' => ['k3_supervision_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'k3_supervision_id' => 'Pengawasan K3',
            'ksd_date' => AppLabels::DATE,
            'ksd_finding' => AppLabels::FINDING,
            'ksd_officer_action' => 'Tindakan Pengawas K3',
            'ksd_response' => AppLabels::RESPONSE,
            'ksd_finding_desc' => sprintf("%s %s", AppLabels::INFORMATION, AppLabels::FINDING),
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->ksd_date == '') {
            $this->ksd_date = Yii::$app->formatter->asDate($this->ksd_date, AppConstants::FORMAT_DB_DATE_PHP);
        }


        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->ksd_date == '') {
            $this->ksd_date = Yii::$app->formatter->asDate($this->ksd_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK3Supervision()
    {
        return $this->hasOne(K3Supervision::className(), ['id' => 'k3_supervision_id']);
    }
}
