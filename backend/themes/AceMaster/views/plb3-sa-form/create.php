<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaForm */
/* @var $startDate DateTime */
/* @var $plb3SAModel \backend\models\Plb3SelfAssessment */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $plb3SaFormDetailStaticModel \backend\models\Plb3SaFormDetailStatic */
/* @var $plb3SaFormDetailStaticQuarterModels \backend\models\Plb3SaFormDetailStaticQuarter[] */
/* @var $questionGroups \backend\models\Codeset[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::SELF_ASSESSMENT_SHORT, AppLabels::PLB3);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::SELF_ASSESSMENT_SHORT, $plb3SAModel->getSummary()), 'url' => ['/plb3-self-assessment/update', 'id' => $plb3SAModel->id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::SELF_ASSESSMENT_SHORT, AppLabels::PLB3)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-form-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'startDate' => $startDate,
        'plb3SAModel' => $plb3SAModel,
        'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
        'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
        'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels,
        'questionGroups' => $questionGroups
    ]) ?>

</div>
