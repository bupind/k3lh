<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "roadmap_k3l_attribute".
 *
 * @property integer $id
 * @property string $attr_type_code
 * @property string $attr_text
 * @property integer $attr_parent_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property RoadmapK3lAttribute $attrParent
 * @property RoadmapK3lAttribute[] $roadmapK3lAttributes
 * @property RoadmapK3lItem[] $roadmapK3lItems
 * @property RoadmapK3lTarget[] $roadmapK3lTargets
 */
class RoadmapK3lAttribute extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'roadmap_k3l_attribute';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['attr_type_code', 'attr_text'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['attr_parent_id'], 'integer'],
            [['attr_type_code'], 'string', 'max' => 10],
            [['attr_text'], 'string', 'max' => 255],
            [['attr_parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadmapK3lAttribute::className(), 'targetAttribute' => ['attr_parent_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'attr_type_code' => AppLabels::ATTRIBUTE_TYPE,
            'attr_text' => AppLabels::TEXT,
            'attr_parent_id' => AppLabels::PARENT,
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrParent() {
        return $this->hasOne(RoadmapK3lAttribute::className(), ['id' => 'attr_parent_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lAttributes() {
        return $this->hasMany(RoadmapK3lAttribute::className(), ['attr_parent_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lItems() {
        return $this->hasMany(RoadmapK3lItem::className(), ['roadmap_k3l_attribute_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lTargets() {
        return $this->hasMany(RoadmapK3lTarget::className(), ['roadmap_k3l_attribute_id' => 'id']);
    }
}
