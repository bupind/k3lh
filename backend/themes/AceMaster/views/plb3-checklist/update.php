<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Checklist */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::CHECKLIST, AppLabels::WASTE);
$this->params['breadcrumbs'][] = ['label' => sprintf('Form %s %s', AppLabels::CHECKLIST, AppLabels::WASTE), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $model->sector->sector_name, $model->powerPlant->pp_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="plb3-checklist-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
