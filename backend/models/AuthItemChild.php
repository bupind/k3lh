<?php

namespace backend\models;

use common\vendor\AppLabels;
use Yii;
use common\vendor\AppConstants;
use yii\base\Exception;

/**
 * This is the model class for table "auth_item_child".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthItem $parent0
 * @property AuthItem $child0
 */
class AuthItemChild extends AppModel {
    public function behaviors() { return []; }
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'auth_item_child';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent', 'child'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['child' => 'name']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'parent' => AppLabels::AUTH_PARENT,
            'child' => AppLabels::AUTH_CHILD,
        ];
    }
    
    public function saveTransactional() {
        $request = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        $clean[] = TRUE;
        $insert = $this->isNewRecord;
        
        try {
            
            if (!empty($request['childs'])) {
                if ($insert) {
                    foreach ($request['childs'] as $child) {
                        $authItemChild = new AuthItemChild();
                        $authItemChild->parent = $request['AuthItemChild']['parent'];
                        $authItemChild->child = $child;
                        if (!$authItemChild->save()) {
                            throw new Exception(join(',', $authItemChild->errors));
                        }
                    }
                }
            } else {
                throw new Exception(sprintf(AppConstants::ERR_AT_LEAST_ONE, AppLabels::AUTH_CHILD));
            }
            
            $transaction->commit();
            return true;
            
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->addFlash('danger', $e->getMessage());
            return false;
        }
    }
    
    public function getId() {
        return $this->parent . '-' . $this->child;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0() {
        return $this->hasOne(AuthItem::className(), ['name' => 'parent']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0() {
        return $this->hasOne(AuthItem::className(), ['name' => 'child']);
    }
}
