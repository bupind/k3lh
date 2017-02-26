<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuAmbient */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-ambient-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
