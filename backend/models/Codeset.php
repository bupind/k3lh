<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "codeset".
 *
 * @property integer $id
 * @property string $cset_name
 * @property string $cset_code
 * @property string $cset_value
 * @property string $cset_description
 * @property string $cset_parent_pk
 * @property string $created_date
 * @property string $updated_date
 * @property integer $created_by
 * @property integer $updated_by
 */
class Codeset extends AppModel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'codeset';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cset_name', 'cset_code', 'cset_value'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['cset_description'], 'string'],
            [['cset_order'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['cset_name'], 'string', 'max' => 50],
            [['cset_code', 'cset_parent_pk'], 'string', 'max' => 15],
            [['cset_value'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cset_name' => AppLabels::NAME,
            'cset_code' => AppLabels::CODE,
            'cset_value' => AppLabels::VALUE,
            'cset_description' => AppLabels::DESCRIPTION,
            'cset_parent_pk' => sprintf('%s %s', AppLabels::CODE, AppLabels::PARENT),
            'cset_order' => AppLabels::ORDER,
        ];
    }
    
    public static function getCodesetObject($csetName, $csetCode) {
        return Codeset::findOne(['cset_name' => $csetName, 'cset_code' => $csetCode]);
    }
    
    public static function getCodesetValue($csetName, $csetCode) {
        $code = Codeset::findOne(['cset_name' => $csetName, 'cset_code' => $csetCode]);
        return !is_null($code) && !empty($code) ? $code->cset_value : '';
    }
    
    public static function getCodesetAll($csetName, $first = false, $extract = false, $options = []) {
        $limit = $first === true ? 1 : null;
        $where = ['cset_name' => $csetName];
        $columns = ['cset_order' => SORT_ASC, 'id' => SORT_ASC];
        
        $codeset = Codeset::find()->where($where)->orderBy($columns)->limit($limit);
        
        if (isset($options['andFilterWhere'])) {
            foreach ($options['andFilterWhere'] as $filterCondition) {
                $codeset->andFilterWhere($filterCondition);
            }
        }
        
        $results = $codeset->all();
        
        if ($extract) {
            $temp = [];
            foreach ($results as $model) {
                $temp[$model->cset_code] = $model->cset_value;
            }
            $results = $temp;
        }
        
        return $results;
    }
        
    public static function customMap($csetName, $optionLabel = 'cset_value', $options = []) {
    
        $data = Codeset::find()->where(['cset_name' => $csetName])->orderBy(['cset_order' => SORT_ASC, $optionLabel => SORT_ASC]);
    
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
        
        $map = ArrayHelper::map($data->all(), 'cset_code', $optionLabel);
        if (empty($map)) {
            Yii::$app->session->setFlash('danger', AppConstants::MSG_EMPTY_PLEASE_ADD);
        }
    
        if (!isset($options['empty']) || $options['empty'] == true) {
            $map = ArrayHelper::merge(['' => AppLabels::PLEASE_SELECT], $map);
        }
        
        return $map;
    }

}
