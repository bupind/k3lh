<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "ppa_setup_permit".
 *
 * @property integer $id
 * @property integer $ppa_id
 * @property string $ppasp_wastewater_source
 * @property string $ppasp_setup_point_name
 * @property string $ppasp_coord_ls
 * @property string $ppasp_coord_bt
 * @property string $ppasp_wastewater_tech_code
 * @property string $ppasp_permit_number
 * @property string $ppasp_permit_publisher
 * @property string $ppasp_permit_publish_date
 * @property string $ppasp_permit_end_date
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PpaMonth[] $ppaMonths
 * @property Ppa $ppa
 */
class PpaSetupPermit extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ppa_setup_permit';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ppa_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['ppa_id'], 'integer'],
            [['ppasp_permit_publish_date', 'ppasp_permit_end_date'], 'safe'],
            [['ppasp_wastewater_source', 'ppasp_setup_point_name', 'ppasp_permit_publisher'], 'string', 'max' => 150],
            [['ppasp_coord_ls', 'ppasp_coord_bt', 'ppasp_permit_number'], 'string', 'max' => 50],
            [['ppasp_wastewater_tech_code'], 'string', 'max' => 10],
            [['ppa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ppa::className(), 'targetAttribute' => ['ppa_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'ppa_id' => AppLabels::PPA,
            'ppasp_wastewater_source' => AppLabels::WASTE_WATER_SOURCE,
            'ppasp_setup_point_name' => AppLabels::SETUP_POINT_NAME,
            'ppasp_coord_ls' => AppLabels::LS,
            'ppasp_coord_bt' => AppLabels::BT,
            'ppasp_wastewater_tech_code' => AppLabels::WASTE_WATER_TECHNOLOGY,
            'ppasp_permit_number' => AppLabels::PERMIT_NUMBER,
            'ppasp_permit_publisher' => AppLabels::PERMIT_PUBLISHER,
            'ppasp_permit_publish_date' => AppLabels::PERMIT_PUBLISH_DATE,
            'ppasp_permit_end_date' => AppLabels::PERMIT_END_DATE,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpaMonths() {
        return $this->hasMany(PpaMonth::className(), ['ppa_setup_permit_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpa() {
        return $this->hasOne(Ppa::className(), ['id' => 'ppa_id']);
    }
}
