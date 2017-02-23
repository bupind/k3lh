<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuTechnicalProvision */

$this->title = 'Update Ppu Technical Provision: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Technical Provisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ppu-technical-provision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
