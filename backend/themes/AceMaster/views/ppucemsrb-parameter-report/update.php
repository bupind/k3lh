<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsrbParameterReport */
/* @var $ppuModel backend\models\Ppu */
/* @var $parameterList backend\models\PpucemsReportBm[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::REPORT, AppLabels::PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppucemsrb-parameter-report-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'parameterList' => $parameterList,
        'ppuModel' => $ppuModel,
        'model' => $model,
    ]) ?>

</div>
