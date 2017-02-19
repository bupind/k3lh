<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuCompulsoryMonitoredEmissionSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ppu Compulsory Monitored Emission Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-compulsory-monitored-emission-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ppu Compulsory Monitored Emission Source', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ppu_id',
            'ppucmes_name',
            'ppucmes_operation_time',
            'ppucmes_freq_monitoring_obligation_code',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
