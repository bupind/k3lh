<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpuTechnicalProvision */

$this->title = 'Create Ppu Technical Provision';
$this->params['breadcrumbs'][] = ['label' => 'Ppu Technical Provisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-technical-provision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
