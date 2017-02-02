<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "roadmap_k3l_target".
 *
 * @property integer $id
 * @property integer $roadmap_k3l_id
 * @property integer $roadmap_k3l_attribute_id
 * @property string $target_value
 * @property integer $target_order
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property RoadmapK3lAttribute $roadmapK3lAttribute
 * @property RoadmapK3l $roadmapK3l
 */
class RoadmapK3lTarget extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'roadmap_k3l_target';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['roadmap_k3l_id', 'roadmap_k3l_attribute_id', 'target_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['roadmap_k3l_id', 'roadmap_k3l_attribute_id'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['target_value'], 'string', 'max' => 150],
            [['roadmap_k3l_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadmapK3lAttribute::className(), 'targetAttribute' => ['roadmap_k3l_attribute_id' => 'id']],
            [['roadmap_k3l_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadmapK3l::className(), 'targetAttribute' => ['roadmap_k3l_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'roadmap_k3l_id' => AppLabels::ROADMAP,
            'roadmap_k3l_attribute_id' => AppLabels::ATTRIBUTE_TYPE,
            'target_value' => AppLabels::VALUE,
            'target_order' => AppLabels::ORDER
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lAttribute() {
        return $this->hasOne(RoadmapK3lAttribute::className(), ['id' => 'roadmap_k3l_attribute_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3l() {
        return $this->hasOne(RoadmapK3l::className(), ['id' => 'roadmap_k3l_id']);
    }
}
