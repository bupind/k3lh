<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheet */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET);
$this->params['breadcrumbs'][] = ['label' => sprintf('Form %s %s', AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="plb3-balace-sheet-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
