<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ppu Compulsory Monitored Emission Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-compulsory-monitored-emission-source-view">

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
            'ppu_id',
            'ppucmes_name',
            'ppucmes_operation_time',
            'ppucmes_freq_monitoring_obligation_code',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
