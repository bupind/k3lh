<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "roadmap_k3l_item".
 *
 * @property integer $id
 * @property integer $roadmap_k3l_id
 * @property integer $roadmap_k3l_attribute_id
 * @property string $item_value_when
 * @property string $item_value_where
 * @property string $item_value_who
 * @property string $item_value_how_many
 * @property integer $item_value_how_much
 * @property integer $item_order
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property RoadmapK3l $roadmapK3l
 * @property RoadmapK3lAttribute $roadmapK3lAttribute
 */
class RoadmapK3lItem extends AppModel {
    
    public $item_value_how_much_display;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'roadmap_k3l_item';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['roadmap_k3l_id', 'roadmap_k3l_attribute_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['roadmap_k3l_id', 'roadmap_k3l_attribute_id', 'item_value_how_much', 'item_order'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['item_value_where', 'item_value_who', 'item_value_how_many'], 'string'],
            [['item_value_when'], 'safe'],
            [['roadmap_k3l_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadmapK3l::className(), 'targetAttribute' => ['roadmap_k3l_id' => 'id']],
            [['roadmap_k3l_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoadmapK3lAttribute::className(), 'targetAttribute' => ['roadmap_k3l_attribute_id' => 'id']],
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
            'item_value_when' => AppLabels::WHEN,
            'item_value_where' => AppLabels::WHERE,
            'item_value_who' => AppLabels::WHO,
            'item_value_how_many' => AppLabels::HOW_MANY,
            'item_value_how_much' => AppLabels::HOW_MUCH,
            'item_value_how_much_display' => AppLabels::HOW_MUCH,
            'item_order' => AppLabels::ORDER
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        if ($this->roadmapK3lAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM) {
            $this->item_value_when = \Yii::$app->formatter->asDate($this->item_value_when, AppConstants::FORMAT_DB_DATE_PHP);
        }
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->item_value_how_much_display = $this->item_value_how_much;
        $this->item_value_when = \Yii::$app->formatter->asDate($this->item_value_when);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3l() {
        return $this->hasOne(RoadmapK3l::className(), ['id' => 'roadmap_k3l_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lAttribute() {
        return $this->hasOne(RoadmapK3lAttribute::className(), ['id' => 'roadmap_k3l_attribute_id']);
    }
}
