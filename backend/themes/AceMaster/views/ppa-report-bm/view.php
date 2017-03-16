<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppa Report Bms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-report-bm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ppa_setup_permit_id',
            'ppar_param_code',
            'ppar_param_unit_code',
            'ppar_qs_1',
            'ppar_qs_2',
            'ppar_qs_unit_code',
            'ppar_qs_ref',
            'ppar_qs_max_pollution_load',
            'ppar_qs_load_unit_code',
            'ppar_qs_max_pollution_load_ref',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
