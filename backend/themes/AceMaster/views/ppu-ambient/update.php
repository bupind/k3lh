<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuAmbient */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppu-ambient-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
