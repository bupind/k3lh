<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsReportBm */
/* @var $ppuModel backend\models\Ppu */
/* @var $ppucemsrbQuarter backend\models\PpucemsrbQuarter */
/* @var $startDate DateTime */
/* @var $cemsConstant [] */

$this->title = sprintf("%s %s %s %s",AppLabels::BTN_ADD, AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppucems-report-bm-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'cemsConstant' => $cemsConstant,
        'ppucemsrbQuarter' => $ppucemsrbQuarter,
        'startDate' => $startDate,
        'ppuModel' => $ppuModel,
        'model' => $model,
    ]) ?>

</div>
