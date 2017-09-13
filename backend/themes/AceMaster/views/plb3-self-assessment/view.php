<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SelfAssessment */
/* @var $startDate DateTime */
/* @var $questionGroups \backend\models\Codeset[] */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $plb3SaFormDetailStaticModel \backend\models\Plb3SaFormDetailStatic */
/* @var $plb3SaFormDetailStaticQuarterModels \backend\models\Plb3SaFormDetailStaticQuarter[] */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::SELF_ASSESSMENT);
$this->params['subtitle'] = $model->getSummary();
$this->params['breadcrumbs'][] = ['label' => AppLabels::SELF_ASSESSMENT, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-self-assessment-view">

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
        <div class="col-xs-6 col-xs-offset-3">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::COMPANY_PROFILE, '#company-profile', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::B3_WASTE_MANAGEMENT, '#b3-waste-management', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="company-profile" class="tab-pane fade active in">
                        <?php if (!is_null($model->plb3SaCompanyProfile)): ?>
                        <?= DetailView::widget([
                            'model' => $model->plb3SaCompanyProfile,
                            'options' => [
                                'excluded' => ['plb3_self_assessment_id'],
                                'converter' => [
                                    'profile_contacts_name' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asNtext($model->plb3SaCompanyProfile->profile_contacts_name)],
                                    'profile_contacts_mobile_phone' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asNtext($model->plb3SaCompanyProfile->profile_contacts_mobile_phone)],
                                    'profile_contacts_email' => [AppConstants::FORMAT_TYPE_VARIABLE, Yii::$app->formatter->asNtext($model->plb3SaCompanyProfile->profile_contacts_email)],
                                ]
                            ]
                        ]); ?>
                        <?php else: ?>
                            <?= AppConstants::MSG_DATA_NOT_FOUND; ?>
                        <?php endif; ?>
                    </div>
                    <div id="b3-waste-management" class="tab-pane fade">
                        <?php if (!is_null($model->plb3SaForm)): ?>
                        <?= $this->render('_b3_waste_management', [
                            'model' => $model,
                            'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
                            'startDate' => clone $startDate,
                            'questionGroups' => $questionGroups,
                            'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
                            'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
                        ]); ?>
                        <?php else: ?>
                            <?= AppConstants::MSG_DATA_NOT_FOUND; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL
                ]
            ]); ?>
        </div>
    </div>

</div>
