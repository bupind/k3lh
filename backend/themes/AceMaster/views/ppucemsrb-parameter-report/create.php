<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpucemsrbParameterReport */
/* @var $ppuModel backend\models\Ppu */
/* @var $parameterList backend\models\PpucemsReportBm[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::REPORT, AppLabels::PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER), 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppucemsrb-parameter-report-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'parameterList' => $parameterList,
        'ppuModel' => $ppuModel,
        'model' => $model,
    ]) ?>

</div>
