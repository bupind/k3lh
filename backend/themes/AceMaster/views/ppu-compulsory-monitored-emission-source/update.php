<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */
/* @var $ppuId backend\models\Ppu */
/* @var $ppuModel backend\models\Ppu */
/* @var $startDate DateTime */
/* @var $ppuMonthModels backend\models\PpucmesMonth */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::ADHERENCE_POINT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ADHERENCE_POINT, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppucmes_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-compulsory-monitored-emission-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'ppuModel' => $ppuModel,
        'model' => $model,
        'startDate' => $startDate,
        'ppuMonthModels' => $ppuMonthModels,
    ]) ?>

</div>
