<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaCompanyProfile */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::COMPANY_PROFILE);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::COMPANY_PROFILE, $model->plb3SelfAssessment->getSummary()), 'url' => ['/plb3-self-assessment/update', 'id' => $model->plb3SelfAssessment->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::COMPANY_PROFILE, 'url' => ['index', 'plb3SAId' => $model->plb3SelfAssessment->id]];
$this->params['subtitle'] = $model->profile_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-company-profile-view">

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
    
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'excluded' => ['plb3_self_assessment_id']
        ]
    ]); ?>
    <?= ViewButton::widget([
        'model' => $model,
        'options' => [
            'buttons' => [
                'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'plb3SAId' => $model->plb3_self_assessment_id], ['class' => 'btn btn-white btn-success btn-bold']),
                'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'plb3SAId' => $model->plb3_self_assessment_id], ['class' => 'btn btn-white btn-danger btn-bold']),
            ]
        ]
    ]); ?>

</div>
