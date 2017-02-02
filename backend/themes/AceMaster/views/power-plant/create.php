<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::POWER_PLANT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::POWER_PLANT, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="power-plant-create">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
