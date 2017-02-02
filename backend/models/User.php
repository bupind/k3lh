<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User as UserModel;

/**
 * This is the model class for table "user".
 *
 * @property Employee[] $employee
 * @property AuthAssignment $authAssignments
 * @property boolean $isAdmin
 * @property UserSector $userSectors
 * @property url employeeLink
 */
class User extends UserModel {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee() {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\helper\Url
     */
    public function getEmployeeLink() {
        if (!empty($this->employee->name)) {
            $url = Url::toRoute(['employee/view', 'id' => $this->employee_id]);
            $options = ['escape' => false, 'title' => 'Employee', 'target' => 'blank'];
            return Html::a($this->employee->name, $url, $options);
        } else {
            return null;
        }
    }
    
    public function getAuthAssignments() {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }
    
    public function isAdmin() {
        $adminItem = AuthItem::findOne(['type' => 4]);
        $assignmentCount = AuthAssignment::find()->where(['item_name' => $adminItem->name, 'user_id' => $this->id])->count();
        return $assignmentCount > 0;
    }
    
    public function getUserSectors() {
        return $this->hasMany(UserSector::className(), ['user_id' => 'id']);
    }
    
}
