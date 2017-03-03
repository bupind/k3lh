<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsReportBm */
/* @var $ppuModel backend\models\Ppu */
/* @var $ppucemsrbQuarter backend\models\PpucemsrbQuarter */
/* @var $startDate DateTime */
/* @var $cemsConstant [] */

$this->title = sprintf("%s %s %s %s", AppLabels::BTN_UPDATE, AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppucems-report-bm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'cemsConstant' => $cemsConstant,
        'startDate' => $startDate,
        'ppuModel' => $ppuModel,
        'ppucemsrbQuarter' => $ppucemsrbQuarter,
        'model' => $model,
    ]) ?>

</div>
