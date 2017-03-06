<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_laboratorium_accreditation".
 *
 * @property integer $id
 * @property integer $ppa_laboratorium_id
 * @property string $lacc_number
 * @property string $lacc_end_date
 * @property string $lacc_remark
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaLaboratorium $ppaLaboratorium
 */
class PpaLaboratoriumAccreditation extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_laboratorium_accreditation';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_laboratorium_id', 'lacc_number'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_laboratorium_id'], 'integer'],
            [['lacc_end_date'], 'safe'],
            [['lacc_end_date'], 'date', 'format' => AppConstants::FORMAT_DATE_PHP, 'message' => AppConstants::VALIDATE_DATE],
            [['lacc_number'], 'string', 'max' => 50],
            [['lacc_remark'], 'string', 'max' => 255],
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
            'lacc_number' => AppLabels::LABOR_ACCREDITATION_NUMBER_TITLE,
            'lacc_end_date' => AppLabels::LABOR_ACCREDITATION_END_DATE_TITLE,
            'lacc_remark' => AppLabels::REMARK,
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        $this->lacc_end_date = Yii::$app->formatter->asDate($this->lacc_end_date, AppConstants::FORMAT_DB_DATE_PHP);
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->lacc_end_date = Yii::$app->formatter->asDate($this->lacc_end_date, AppConstants::FORMAT_DATE_PHP);
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaLaboratorium() {
        return $this->hasOne(PpaLaboratorium::className(), ['id' => 'ppa_laboratorium_id']);
    }
}
