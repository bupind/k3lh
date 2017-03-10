<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_pollution_load_decrease_year".
 *
 * @property integer $id
 * @property integer $ppa_pollution_load_decrease_id
 * @property integer $ppapldy_year
 * @property string $ppapldy_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaPollutionLoadDecrease $ppaPollutionLoadDecrease
 */
class PpaPollutionLoadDecreaseYear extends AppModel {
    
    public $ppapldy_value_display;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_pollution_load_decrease_year';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_pollution_load_decrease_id', 'ppapldy_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_pollution_load_decrease_id', 'ppapldy_year'], 'integer'],
            [['ppapldy_value'], 'number'],
            [['ppa_pollution_load_decrease_id'], 'exist', 'skipOnError' => true, 'targetClass' => PpaPollutionLoadDecrease::className(), 'targetAttribute' => ['ppa_pollution_load_decrease_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_pollution_load_decrease_id' => AppLabels::POLLUTION_LOAD_DECREASE,
            'ppapldy_year' => AppLabels::YEAR,
            'ppapldy_value' => AppLabels::VALUE,
            'ppapldy_value_display' => AppLabels::VALUE,
        ];
    }
    
    public function afterFind() {
        parent::afterFind();
    
        $this->ppapldy_value += 0;
        $this->ppapldy_value_display = $this->ppapldy_value;
        
        return true;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaPollutionLoadDecrease() {
        return $this->hasOne(PpaPollutionLoadDecrease::className(), ['id' => 'ppa_pollution_load_decrease_id']);
    }
}
