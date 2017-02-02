<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::POWER_PLANT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::POWER_PLANT, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pp_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="power-plant-update">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
