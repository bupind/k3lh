<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */

$this->title = 'Create Ppa Report Bm';
$this->params['breadcrumbs'][] = ['label' => 'Ppa Report Bms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-report-bm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
