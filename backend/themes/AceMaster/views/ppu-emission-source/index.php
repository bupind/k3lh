<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuEmissionSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ppu Emission Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-emission-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ppu Emission Source', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ppu_id',
            'ppues_name',
            'ppues_chimney_name',
            'ppues_capacity',
            // 'ppues_control_device',
            // 'ppues_fuel_name_code',
            // 'ppues_total_fuel',
            // 'ppues_fuel_unit_code',
            // 'ppues_operation_time',
            // 'ppues_location',
            // 'ppues_coord_ls',
            // 'ppues_coord_bt',
            // 'ppues_chimney_shape_code',
            // 'ppues_chimney_height',
            // 'ppues_chimney_diameter',
            // 'ppues_hole_position',
            // 'ppues_monitoring_data_status_code',
            // 'ppues_freq_monitoring_obligation_code',
            // 'ppues_ref',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
