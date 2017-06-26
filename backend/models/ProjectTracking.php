<?php

namespace backend\models;

use Yii;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "project_tracking".
 *
 * @property integer $id
 * @property integer $sector_id
 * @property integer $power_plant_id
 * @property string $pt_name
 * @property string $pt_goal
 * @property string $pt_description
 * @property string $pt_owner_code
 * @property string $pt_report_period
 * @property string $pt_controller_code
 * @property string $pt_report_to_code
 * @property integer $pt_estimated_project_value
 * @property string $pt_ao_no
 * @property string $pt_easy_impact
 * @property string $pt_support
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property PowerPlant $powerPlant
 * @property Sector $sector
 * @property ProjectTrackingDetail[] $projectTrackingDetails
 * @property ProjectTrackingDetail $firstActivity
 * @property ProjectTrackingDetail $lastActivity
 */
class ProjectTracking extends AppModel {
    
    public $pt_estimated_project_value_display;
    public $pt_report_to_code_array;
    public $pt_report_to_code_view;
    public $pt_owner_code_desc;
    public $pt_controller_code_desc;
    public $start_date;
    public $end_date;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'project_tracking';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sector_id', 'pt_name'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['sector_id', 'power_plant_id', 'pt_estimated_project_value'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['pt_description', 'pt_report_to_code', 'pt_controller_code'], 'string'],
            [['pt_report_period'], 'safe'],
            [['pt_name', 'pt_goal'], 'string', 'max' => 255],
            [['pt_ao_no', 'pt_support', 'pt_report_to_code'], 'string', 'max' => 100],
            [['pt_controller_code', 'pt_owner_code'], 'string', 'max' => 10],
            [['pt_easy_impact'], 'string', 'max' => 1],
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
            'sector_id' => AppLabels::SECTOR,
            'power_plant_id' => AppLabels::POWER_PLANT,
            'pt_name' => AppLabels::NAME,
            'pt_goal' => AppLabels::GOAL,
            'pt_description' => AppLabels::DESCRIPTION,
            'pt_owner_code' => AppLabels::OWNER,
            'pt_owner_code_desc' => AppLabels::OWNER,
            'pt_report_period' => AppLabels::REPORT_PERIOD,
            'pt_controller_code' => AppLabels::CONTROLLER,
            'pt_controller_code_desc' => AppLabels::CONTROLLER,
            'pt_report_to_code' => AppLabels::REPORT_TO,
            'pt_report_to_code_array' => AppLabels::REPORT_TO,
            'pt_report_to_code_view' => AppLabels::REPORT_TO,
            'pt_estimated_project_value' => AppLabels::ESTIMATED_PROJECT_VALUE,
            'pt_estimated_project_value_display' => AppLabels::ESTIMATED_PROJECT_VALUE,
            'pt_ao_no' => AppLabels::PT_AO_AI_NO,
            'pt_easy_impact' => AppLabels::PT_EASY_IMPACT,
            'pt_support' => AppLabels::PT_SUPPORTED_KPI,
            'start_date' => AppLabels::START_DATE,
            'end_date' => AppLabels::END_DATE
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        
        $requestData = Yii::$app->request->post();
        $this->pt_report_to_code = !empty($requestData['ProjectTracking']['pt_report_to_code_array']) ? join(',', $requestData['ProjectTracking']['pt_report_to_code_array']) : '';
        
        return true;
    }
    
    public function beforeValidate() {
        parent::beforeValidate();
        
        $this->pt_report_period = !empty($this->pt_report_period) ? Yii::$app->formatter->asDate(sprintf('01-%s', $this->pt_report_period), AppConstants::FORMAT_DB_DATE_PHP) : '';
        
        return true;
    }
    
    public function afterFind() {
        parent::afterFind();
        
        $this->pt_report_period = Yii::$app->formatter->asDate($this->pt_report_period, 'php:m-Y');
        $this->pt_estimated_project_value_display = $this->pt_estimated_project_value;
        $this->pt_report_to_code_array = explode(',', $this->pt_report_to_code);
        $this->pt_report_to_code_view = $this->converterOwnerToView($this->pt_report_to_code_array);
        $this->pt_owner_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PROJECT_TRACKING_LIST, $this->pt_owner_code);
        $this->pt_controller_code_desc = Codeset::getCodesetValue(AppConstants::CODESET_PROJECT_TRACKING_LIST, $this->pt_controller_code);
        $this->start_date = !empty($this->firstActivity->ptd_start_date) ? Yii::$app->formatter->asDate($this->firstActivity->ptd_start_date, AppConstants::FORMAT_DATE_PHP) : '';
        $this->end_date = !empty($this->lastActivity->end_date) ? Yii::$app->formatter->asDate($this->lastActivity->end_date, AppConstants::FORMAT_DATE_PHP) : '';
        
        return true;
    }
    
    private function converterOwnerToView($sources) {
        $result = [];
        foreach ($sources as $source) {
            $result[] = Codeset::getCodesetValue(AppConstants::CODESET_PROJECT_TRACKING_LIST, $source);
        }
        
        return $result;
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
    public function getProjectTrackingDetails() {
        return $this->hasMany(ProjectTrackingDetail::className(), ['project_tracking_id' => 'id']);
    }
    
    public function getFirstActivity() {
        return $this->hasOne(ProjectTrackingDetail::className(), ['project_tracking_id' => 'id'])->orderBy(['ptd_start_date' => SORT_ASC]);
    }
    
    public function getLastActivity() {
        return $this->hasOne(ProjectTrackingDetail::className(), ['project_tracking_id' => 'id'])->orderBy(['ptd_start_date' => SORT_DESC]);
    }
}
