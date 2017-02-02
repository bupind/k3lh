<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\BudgetMonitoring */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::BUDGET_MONITORING, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::BUDGET_MONITORING, $title), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-monitoring-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantList' => $powerPlantList,
    ]) ?>

</div>
