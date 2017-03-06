<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use backend\models\Log;
use backend\models\User;
use backend\models\LogDirty;
use yii\helpers\ArrayHelper;
use common\components\helpers\Converter;

/**
 * Description of AppModel
 *
 * @author Joko Hermanto
 */
class AppModel extends \yii\db\ActiveRecord {
    
    public function behaviors() {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by'
            ],
            TimestampBehavior::className(),
        ];
    }
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        
        $format = $insert ? AppConstants::LOG_MSG_ACTION_INSERT : AppConstants::LOG_MSG_ACTION_UPDATE;
        $action = sprintf($format, $this->id);
                
        $log = new Log();
        $log->success($this->tableName(), $action);
        
        $this->logDirtyAttributes($insert, $changedAttributes);
        
        return true;
    }
    
    public function logDirtyAttributes($insert, $changedAttributes) {
        if (!$insert) {
            
            $excludedAttributes = ['created_by', 'created_at', 'updated_by', 'updated_at'];
            $excludedModels = ['Codeset'];
            foreach ($changedAttributes as $changedKey => $changedVal) {     
                $modelName = Converter::modelName($this->className());
                if (!in_array($changedKey, $excludedAttributes) && !in_array($modelName, $excludedModels) && $this->getAttribute($changedKey) != $changedVal) {   
                    
                    $logDirty = new LogDirty();
                    $logDirty->data_id = $this->getAttribute('id');
                    $logDirty->controller = \Yii::$app->controller->id;
                    $logDirty->model = $modelName;
                    $logDirty->label = $this->getAttributeLabel($changedKey);
                    $logDirty->original_value = (string) $changedVal;
                    $logDirty->changed_value = (string) $this->getAttribute($changedKey);
                    
                    $logDirty->save();
                }
            }
        }
    }
    
    public function delete() {
        
        try {
            return parent::delete();
        } catch (\Exception $ex) {
            Yii::$app->session->addFlash('danger', $ex->getMessage());
            Yii::$app->session->addFlash('danger', AppConstants::ERR_INTEGRITY_CONSTRAINT_VIOLATION);
            return false;
        }
    }
    
    public function afterDelete() {
        parent::afterDelete();
        
        $action = sprintf(AppConstants::LOG_MSG_ACTION_DELETE, $this->id);
                
        $log = new Log();
        $log->success($this->tableName(), $action);
        
        return true;
    }
    
    public static function map($model, $optionLabel, $optionGroup = null, $labelAsSortKey = true, $options = []) {
        
        $sortKey = !is_bool($labelAsSortKey) ? $labelAsSortKey : $optionLabel;
        $data = $model::find()->orderBy([$sortKey => SORT_ASC]);
    
        if (isset($options['where'])) {
            foreach ($options['where'] as $where) {
                $data->where($where);
            }
        }
    
        if (isset($options['andWhere'])) {
            foreach ($options['andWhere'] as $andWhere) {
                $data->andWhere($andWhere);
            }
        }
        
        if (isset($options['filter'])) {
            foreach ($options['filter'] as $filter) {
                $data->andFilterWhere($filter);
            }
        }
        
        $map = ArrayHelper::map($data->all(), 'id', $optionLabel, $optionGroup);
//        if (empty($map)) {
//            Yii::$app->session->addFlash('danger', AppConstants::MSG_EMPTY_PLEASE_ADD);
//        }
        
        if (!isset($options['empty']) || $options['empty'] == true) {
            $map = ArrayHelper::merge(['' => AppLabels::PLEASE_SELECT], $map);
        }
        
        return $map;
    }
    
    public function getCreatedByName() {
        return User::findOne(['id' => $this->created_by])->employee->name;
    }
    
    public function getCreatedByUsername() {
        return User::findOne(['id' => $this->created_by])->username;
    }
    
    public function getCreatedByEmployee() {
        return User::findOne(['id' => $this->created_by])->employee;
    }
    
}
