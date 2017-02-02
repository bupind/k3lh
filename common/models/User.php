<?php

namespace common\models;

use backend\models\UserSector;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use backend\models\Employee;
use common\vendor\AppConstants;
use backend\models\AppModel;
use backend\models\Codeset;
use backend\models\AuthAssignment;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property integer $status
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $password write-only password
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $employee_id
 * @property integer $branch_id
 * @property User[] $map
 * 
 * @property Employee[] $employee
 */
class User extends AppModel implements IdentityInterface {
    
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_REGISTER = 'register';

    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'on' => self::SCENARIO_REGISTER, 'message' => AppConstants::VALIDATE_REQUIRED],
            ['username', 'unique', 'on' => self::SCENARIO_REGISTER, 'targetClass' => '\common\models\User', 'message' => AppConstants::VALIDATE_UNIQUE],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT, 'tooLong' => AppConstants::VALIDATE_TOO_LONG],
            ['password', 'required', 'on' => self::SCENARIO_REGISTER, 'message' => AppConstants::VALIDATE_REQUIRED],
            ['password', 'string', 'min' => 6, 'tooShort' => AppConstants::VALIDATE_TOO_SHORT],
            ['employee_id', 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            ['branch_id', 'safe'],
            ['status', 'default', 'value' => 'Y'],
            ['status', 'in', 'range' => ['Y', 'N']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'employee_id' => Yii::t('app', 'Karyawan'),
            'branch_id' => Yii::t('app', 'Cabang'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status Aktif'),
            'created_at' => Yii::t('app', 'Terdaftar'),
            'updated_at' => Yii::t('app', 'Diubah'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => 'Y']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => 'Y']);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => 'Y',
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }
    
    public function getStatusName() {
        return AppConstants::$yesNoList[$this->status];
    }
    
    public function getEmployee() {
        return Employee::findOne($this->employee_id);
    }
    
    public function validateIpAddress() {
        $allowedIp = array_map('trim', explode(';', Codeset::getCodesetValue(AppConstants::CODESET_NAME_WEB_CONFIG, AppConstants::WEB_CONFIG_ALLOWED_IP)));
        $ipAddress = Yii::$app->request->userIP;
        
        if (!in_array($ipAddress, $allowedIp)) {
            return false;
        }
        
        return true;
    }

    /**
     * Create New User, Employee and Auth Assignment
     * @param array Yii::$app->request->post() POST data
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        $request = Yii::$app->request->post();        
        $transaction = User::getDb()->beginTransaction();
        $clean[] = TRUE;
        
        try {
                       
            // save employee
            $employeeMdl = new Employee();
            $employeeMdl->joined_date = date('Y-m-d');
            $employeeMdl->load($request);
            
            $clean[] = $employeeMdl->save() !== FALSE;
            
            // save user
            $this->load($request);
            $this->employee_id = $employeeMdl->id;
            $this->branch_id = 1;
            
            if (!empty($this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }

            $clean[] = $this->save() !== FALSE;
                
            // save auth assignment
            foreach ($request['auth_items'] as $authItem) {
                $authAssignmentMdl = new AuthAssignment();
                $authAssignmentMdl->item_name = $authItem;
                $authAssignmentMdl->user_id = $this->id;
                
                $clean[] = $authAssignmentMdl->save() !== FALSE;
            }
    
            // save user sectors
            foreach ($request['user_sectors'] as $userSector) {
                $userSectorMdl = new UserSector();
                $userSectorMdl->user_id = $this->id;
                $userSectorMdl->sector_id = $userSector;
        
                $clean[] = $userSectorMdl->save() !== FALSE;
            }

            if (!in_array(FALSE, $clean)) {
                $transaction->commit();
                return TRUE;
            } else {
                throw new Exception;
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            return false;
        }

        return null;
    }
    
    /**
     * Update User, Employee and Auth Assignment
     * @param array Yii::$app->request->post() POST data
     * @return User|null the saved model or null if saving fails
     */
    public function signupUpdate() {
        $request = Yii::$app->request->post();        
        $transaction = User::getDb()->beginTransaction();
        $clean[] = TRUE;
                
        try {
                       
            // update employee
            $employeeMdl = $this->employee;
            $employeeMdl->load($request);
            
            $clean[] = $employeeMdl->save() !== FALSE;
            
            // update user
            $this->load($request);
            
            if (!empty($this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }

            $clean[] = $this->save() !== FALSE;
                
            /*
             * before update auth assignment, 
             * all previous auth assignments related with this user id should be removed
             * and then re-insert new data.
             */
            AuthAssignment::deleteAll('user_id=' . $this->id);
            if (isset($request['auth_items']) && !empty($request['auth_items'])) {
                foreach ($request['auth_items'] as $authItem) {
                    $authAssignmentMdl = new AuthAssignment();
                    $authAssignmentMdl->item_name = $authItem;
                    $authAssignmentMdl->user_id = $this->id;
        
                    $clean[] = $authAssignmentMdl->save() !== FALSE;
                }
            }
    
            UserSector::deleteAll('user_id=' . $this->id);
            if (isset($request['user_sectors']) && !empty($request['user_sectors'])) {
                foreach ($request['user_sectors'] as $userSector) {
                    $userSectorMdl = new UserSector();
                    $userSectorMdl->user_id = $this->id;
                    $userSectorMdl->sector_id = $userSector;
        
                    $clean[] = $userSectorMdl->save() !== FALSE;
                }
            }
            
            if (!in_array(FALSE, $clean)) {
                $transaction->commit();
                return TRUE;
            } else {                
                throw new Exception;
            }
        } catch (Exception $ex) {
            $transaction->rollBack(); 
            return FALSE;
        }

        return null;
    }
    
    public function updateProfile() {
        $request = Yii::$app->request->post();
        $transaction = User::getDb()->beginTransaction();
        $clean[] = TRUE;
        
        try {
            
            // update employee
            $employeeMdl = $this->employee;
            $employeeMdl->load($request);
            
            $clean[] = $employeeMdl->save() !== FALSE;
            
            // update user
            $this->load($request);
            
            if (!empty($this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }
            
            $clean[] = $this->save() !== FALSE;
            
            if (!in_array(FALSE, $clean)) {
                $transaction->commit();
                return TRUE;
            } else {
                throw new Exception;
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            return FALSE;
        }
        
        return null;
    }
    
    public function softDelete() {
        $this->status = AppConstants::STATUS_NO;
        $this->save();
        
        return true;
    }

}
