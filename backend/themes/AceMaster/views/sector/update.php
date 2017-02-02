<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Sector */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::SECTOR);
$this->params['breadcrumbs'][] = ['label' => AppLabels::SECTOR, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sector_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="sector-update">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
