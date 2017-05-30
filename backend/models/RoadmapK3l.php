<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\base\Exception;

/**
 * This is the model class for table "roadmap_k3l".
 *
 * @property integer $id
 * @property string $form_type_code
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $k3l_year
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property RoadmapK3lItem[] $roadmapK3lItems
 * @property RoadmapK3lTarget[] $roadmapK3lTargets
 */
class RoadmapK3l extends AppModel {
    
    public $form_type_code_desc;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'roadmap_k3l';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['form_type_code', 'sector_id', 'power_plant_id', 'k3l_year'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['form_type_code'], 'string', 'max' => 10],
            [['k3l_year'], 'string', 'max' => 4],
            [['power_plant_id'], 'exist', 'skipOnError' => true, 'targetClass' => PowerPlant::className(), 'targetAttribute' => ['power_plant_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'form_type_code' => AppLabels::FORM_TYPE,
            'form_type_code_desc' => AppLabels::FORM_TYPE,
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'k3l_year' => AppLabels::YEAR
        ];
    }
    
    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];
        
        try {
            $this->load($request);
            if (!$this->save()) {
                $errors = array_merge($errors, $this->errors);
                throw new Exception();
            }
            
            $roadMapK3lId = $this->id;
    
            if (isset($request['RoadmapK3lItem'])) {
                $request['RoadmapK3lItem'] = array_values($request['RoadmapK3lItem']);
                foreach ($request['RoadmapK3lItem'] as $key => $item) {
                    if (isset($item['id'])) {
                        $itemMdl = RoadmapK3lItem::findOne(['id' => $item['id']]);
                    } else {
                        $itemMdl = new RoadmapK3lItem();
                        $itemMdl->roadmap_k3l_id = $roadMapK3lId;
                        $itemMdl->item_order = $key;
                    }
        
                    if (!$itemMdl->load(['RoadmapK3lItem' => $item]) || !$itemMdl->save()) {
                        $errors = array_merge($errors, $itemMdl->errors);
                        throw new Exception();
                    }
                }
            }
            
            if (isset($request['RoadmapK3lTarget'])) {
                $request['RoadmapK3lTarget'] = array_values($request['RoadmapK3lTarget']);
                foreach ($request['RoadmapK3lTarget'] as $key => $target) {
                    if (isset($target['id'])) {
                        $targetMdl = RoadmapK3lTarget::findOne(['id' => $target['id']]);
                    } else {
                        $targetMdl = new RoadmapK3lTarget();
                        $targetMdl->roadmap_k3l_id = $roadMapK3lId;
                        $targetMdl->target_order = $key;
                    }
                                        
                    if (!$targetMdl->load(['RoadmapK3lTarget' => $target]) || !$targetMdl->save()) {
                        $errors = array_merge($errors, $targetMdl->errors);
                        throw new Exception();
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
    
    public function afterFind() {
        parent::afterFind();
        $this->form_type_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_NAME_FORM_TYPE_CODE, $this->form_type_code);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerPlant() {
        return $this->hasOne(PowerPlant::className(), ['id' => 'power_plant_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector() {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lItems() {
        return $this->hasMany(RoadmapK3lItem::className(), ['roadmap_k3l_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmapK3lTargets() {
        return $this->hasMany(RoadmapK3lTarget::className(), ['roadmap_k3l_id' => 'id']);
    }
}
