<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaBaMonitoringPointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppaBaModel \backend\models\PpaBa */

$this->title = AppLabels::MONITORING_POINT;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaBaModel->getSummary()), 'url' => ['/ppa-ba/update', 'id' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-monitoring-point-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'ppaBaId' => $ppaBaModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                'ppabamp_wastewater_source',
                'ppabamp_monitoring_point_name',
                [
                    'attribute' => 'ppabamp_coord_lat',
                    'format' => 'html'
                ],
                [
                    'attribute' => 'ppabamp_coord_long',
                    'format' => 'html'
                ],
                'ppabamp_document_name',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
