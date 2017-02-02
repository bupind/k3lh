<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\AppModel;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $joined_date
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property integer $salary
 * @property string $commission
 * @property string $note
 * @property string $status
 * @property Employee[] $map
 */
class Employee extends AppModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['joined_date', 'name', 'phone'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['joined_date'], 'safe'],
//            [['salary'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
//            [['commission'], 'number', 'message' => AppConstants::VALIDATE_INTEGER],
            [['note'], 'string'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email', 'message' => AppConstants::VALIDATE_EMAIL],
            ['email', 'string', 'max' => 150, 'tooLong' => AppConstants::VALIDATE_TOO_LONG],
            [['phone'], 'string', 'max' => 15, 'min' => 5, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            [['phone'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['name', 'phone'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'joined_date' => AppLabels::JOIN_DATE,
            'name' => AppLabels::NAME,
            'address' => AppLabels::ADDRESS,
            'email' => AppLabels::EMAIL,
            'phone' => AppLabels::HANDPHONE,
            'salary' => AppLabels::SALARY,
            'commission' => AppLabels::COMMISSIONS,
            'note' => AppLabels::REMARK,
            'status' => AppLabels::ACTIVE_STATUS,
        ];
    }
    
    public function getEmployeeStatus() {
        return AppConstants::$yesNoList[$this->status];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->joined_date = \Yii::$app->formatter->asDate($this->joined_date, AppConstants::FORMAT_DB_DATE_PHP);
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->joined_date = \Yii::$app->formatter->asDate($this->joined_date);
//        $this->status = AppConstants::$yesNoList[$this->status];
        $this->salary = Yii::$app->formatter->asCurrency($this->salary);
        
        return true;
    }

}
