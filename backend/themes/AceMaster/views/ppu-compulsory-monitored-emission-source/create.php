<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */
/* @var $ppuId backend\models\Ppu */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuMonthModels backend\models\PpucmesMonth */


$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::ADHERENCE_POINT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ADHERENCE_POINT, 'url' => ['index', 'ppuId' => $ppuModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-compulsory-monitored-emission-source-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'ppuModel' => $ppuModel,
        'model' => $model,
        'startDate' => $startDate,
        'ppuMonthModels' => $ppuMonthModels,
    ]) ?>

</div>
