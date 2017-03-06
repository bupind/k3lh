<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_laboratorium_test".
 *
 * @property integer $id
 * @property integer $ppa_laboratorium_id
 * @property integer $test_month
 * @property integer $test_year
 * @property integer $test_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium $ppaLaboratorium
 */
class PpaLaboratoriumTest extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_laboratorium_test';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_laboratorium_id', 'test_month', 'test_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_laboratorium_id', 'test_month', 'test_year', 'test_value'], 'integer'],
            [['ppa_laboratorium_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaLaboratorium::className(), 'targetAttribute' => ['ppa_laboratorium_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_laboratorium_id' => AppLabels::LABORATORIUM,
            'test_month' => AppLabels::MONTH,
            'test_year' => AppLabels::YEAR,
            'test_value' => AppLabels::VALUE,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratorium() {
        return $this->hasOne(PpaLaboratorium::className(), ['id' => 'ppa_laboratorium_id']);
    }
}
