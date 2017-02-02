<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\AppModel;

/**
 * This is the model class for table "log_dirty".
 *
 * @property integer $id
 * @property integer $data_id
 * @property string $controller
 * @property string $model
 * @property string $label
 * @property string $original_value
 * @property string $changed_value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class LogDirty extends AppModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'log_dirty';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['data_id', 'controller', 'model', 'label', 'original_value', 'changed_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['controller', 'model'], 'string', 'max' => 150],
            [['label', 'original_value', 'changed_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'data_id' => AppLabels::DATA_ID,
            'controller' => AppLabels::CONTROLLER,
            'model' => AppLabels::MODEL,
            'label' => AppLabels::LABEL,
            'original_value' => AppLabels::ORIGINAL_VALUE,
            'changed_value' => AppLabels::CHANGED_VALUE,
            'created_at' => AppLabels::CREATED_AT,
            'created_by' => AppLabels::CREATED_BY
        ];
    }

}
