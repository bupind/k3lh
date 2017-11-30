<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "htd_month".
 *
 * @property integer $id
 * @property integer $hydrant_testing_detail_id
 * @property integer $htdm_month
 * @property string $htdm_date
 * @property integer $htdm_pressure
 * @property integer $htdm_flow_rate
 * @property integer $htdm_vertical
 * @property integer $htdm_horizontal
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property HydrantTestingDetail $hydrantTestingDetail
 */
class HtdMonth extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'htd_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hydrant_testing_detail_id', 'htdm_month'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['hydrant_testing_detail_id', 'htdm_month', 'htdm_pressure', 'htdm_flow_rate', 'htdm_vertical', 'htdm_horizontal'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['htdm_date'], 'safe'],
            [['hydrant_testing_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => HydrantTestingDetail::className(), 'targetAttribute' => ['hydrant_testing_detail_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hydrant_testing_detail_id' => 'Hydrant Testing Detail ID',
            'htdm_month' => AppLabels::MONTH,
            'htdm_date' => AppLabels::DATE,
            'htdm_pressure' => 'Pressure(bar)',
            'htdm_flow_rate' => 'Flow Rate',
            'htdm_vertical' => 'J. Vertikal(m)',
            'htdm_horizontal' => 'J. Horizontal(m)',
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->htdm_date == '') {
            $this->htdm_date = Yii::$app->formatter->asDate($this->htdm_date, AppConstants::FORMAT_DB_DATE_PHP);
        }


        return true;
    }

    public function afterFind() {
        parent::afterFind();

        if(!$this->htdm_date == '') {
            $this->htdm_date = Yii::$app->formatter->asDate($this->htdm_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHydrantTestingDetail()
    {
        return $this->hasOne(HydrantTestingDetail::className(), ['id' => 'hydrant_testing_detail_id']);
    }
}
