<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaCompanyProfile */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::COMPANY_PROFILE);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::COMPANY_PROFILE, $plb3SAModel->getSummary()), 'url' => ['/ppa-self-assessment/update', 'id' => $plb3SAModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::MONITORING_POINT, 'url' => ['index', 'plb3SAId' => $plb3SAModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->profile_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="plb3-sa-company-profile-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'plb3SAModel' => $plb3SAModel,
    ]) ?>

</div>
