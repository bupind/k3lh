<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Skko */
/* @var $sectorModel backend\models\Sector */
/* @var $detailModel backend\models\SkkoDetail */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::DOCUMENTS, AppLabels::SKKO);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::DOCUMENTS, AppLabels::SKKO), 'url' => ['index', '_sId' => $sectorModel->id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s', $model->sector->sector_name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="skko-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'sectorModel' => $sectorModel,
        'detailModel' => $detailModel,
    ]) ?>

</div>
