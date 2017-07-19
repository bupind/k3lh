<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EnvironmentPermitCompanyProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::COMPANY_PROFILE, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['environment-permit-company-profile/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['environment-permit-company-profile/update', '_ppId' => $model->powerPlant->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['environment-permit-company-profile/export', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
]);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}', 'additional_buttons_xs' => '<li>{export_xs}</li>']);
?>
<div class="environment-permit-company-profile-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'ep_profile_name',
                'ep_profile_activity_loc_address:ntext',
                'ep_profile_phone_fax',
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

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => $buttons,
                    'template' => $template,
                ]
            ],
        ]); ?>
    </div>
</div>
