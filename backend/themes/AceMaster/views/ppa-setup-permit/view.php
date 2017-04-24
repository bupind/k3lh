<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::SETUP_POINT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $model->ppa->getSummary()), 'url' => ['/ppa/update', 'id' => $model->ppa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::SETUP_POINT_PERMIT, 'url' => ['index', 'ppaId' => $model->ppa->id]];
$this->params['subtitle'] = $model->ppasp_wastewater_source;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-setup-permit-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h3 class="header smaller lighter green"><?= AppLabels::WASTE_WATER; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'order' => [
                        'ppa_id',
                        'ppasp_wastewater_source',
                        'ppasp_setup_point_name',
                        'ppasp_coord_ls',
                        'ppasp_coord_bt',
                        'ppasp_wastewater_tech_code'
                    ],
                    'converter' => [
                        'ppa_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppa->getSummary()],
                        'ppasp_wastewater_tech_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppasp_wastewater_tech_code_desc]
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <h3 class="header smaller lighter green"><?= AppLabels::PERMIT; ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'order' => [
                        'ppasp_permit_number',
                        'ppasp_permit_publisher',
                        'ppasp_permit_publish_date',
                        'ppasp_permit_end_date',
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <h3 class="header smaller lighter green"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></h3>
            <?php foreach ($model->ppaMonths as $ppaMonth): ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="col-xs-12">
                        <label><strong><?= $ppaMonth->month_label; ?></strong></label>
                    </div>
                    <?= Converter::attachmentExtLink($ppaMonth->ppam_cert_number, $ppaMonth->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppaId' => $model->ppa_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppaId' => $model->ppa_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
