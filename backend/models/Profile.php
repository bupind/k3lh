<?php

namespace backend\models;

use common\components\helpers\Converter;
use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $app_name
 * @property string $address
 * @property string $master_email
 * @property string $title_tag
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $profile_left
 * @property string $profile_center
 * @property string $profile_right
 * @property string $active_status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Profile extends AppModel {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'profile';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['app_name', 'master_email', 'title_tag', 'meta_description', 'meta_keyword', 'active_status'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['address', 'meta_keyword', 'active_status', 'profile_left', 'profile_center', 'profile_right'], 'string'],
            [['app_name'], 'string', 'max' => 100],
            [['active_status'], 'string', 'max' => 1],
            [['master_email'], 'string', 'max' => 150],
            ['master_email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            [['title_tag'], 'string', 'max' => 66],
            [['meta_description'], 'string', 'max' => 120],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'app_name' => AppLabels::APP_NAME,
            'address' => AppLabels::ADDRESS,
            'master_email' => AppLabels::MASTER_EMAIL,
            'title_tag' => AppLabels::TITLE_TAG,
            'meta_description' => AppLabels::META_DESC,
            'meta_keyword' => AppLabels::META_KEYWORD,
            'active_status' => AppLabels::ACTIVE_STATUS,
            'profile_left' => AppLabels::PROFILE,
            'profile_center' => '',
            'profile_right' => ''
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
    
        $connection = Yii::$app->getDb();
        $connection->createCommand("UPDATE profile SET active_status = 'N' WHERE active_status = 'Y'")->execute();
        
        $this->active_status = AppConstants::STATUS_YES;
        
        return true;
    }
    
    public function getActiveStatusDesc() {
        return Converter::format($this->active_status, AppConstants::FORMAT_TYPE_YES_NO);
    }
    
}
