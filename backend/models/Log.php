<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use common\vendor\AppConstants;

/**
 * This is the model class for table "log".
 *
 * @property integer $id
 * @property string $table_name
 * @property string $action
 * @property integer $created_by
 * @property integer $created_at
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 7],
            [['table_name'], 'string', 'max' => 100],
            [['action'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Tipe',
            'table_name' => 'Nama Table',
            'action' => 'Tindakan'
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by'
            ],
            TimestampBehavior::className(),
        ];
    }
    
    public function success($tableName, $action) {
        return $this->log(AppConstants::LOG_SUCCESS, $tableName, $action);
    }
    
    public function error($tableName, $action) {
        return $this->log(AppConstants::LOG_ERROR, $tableName, $action);
    }
    
    private function log($type, $tableName, $action) {
        $data = [
            'Log' => [
                'type' => $type,
                'table_name' => $tableName,
                'action' => $action
            ]
        ];
        
        $this->load($data);
        
        if ($this->validate()) {
            $this->save();
            return true;
        }
        
        return false;
    }
}
