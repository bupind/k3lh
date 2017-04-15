<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3SaCompanyProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */

$this->title = AppLabels::COMPANY_PROFILE;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::COMPANY_PROFILE, $plb3SAModel->getSummary()), 'url' => ['/plb3-self-assessment/update', 'id' => $plb3SAModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-company-profile-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'plb3SAId' => $plb3SAModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                'profile_name',
                'profile_activity_loc_address:ntext',
                'profile_phone_fax',
                // 'profile_main_office_address:ntext',
                // 'profile_holding_name',
                // 'profile_holding_office_address:ntext',
                // 'profile_holding_phone_fax',
                // 'profile_company_established_year',
                // 'profile_industry_field',
                // 'profile_capital_status',
                // 'profile_area_factory',
                // 'profile_number_of_employees',
                // 'profile_production_capacity_installed',
                // 'profile_production_capacity_realization',
                // 'profile_raw_material',
                // 'profile_adjuvant_material',
                // 'profile_production_process:ntext',
                // 'profile_export_marketing_percentage',
                // 'profile_local_marketing_percentage',
                // 'profile_environment_document:ntext',
                // 'profile_contacts_name:ntext',
                // 'profile_contacts_mobile_phone:ntext',
                // 'profile_contacts_email:ntext',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    
</div>
