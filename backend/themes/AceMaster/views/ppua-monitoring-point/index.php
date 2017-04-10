<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuaMonitoringPointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuaModel backend\models\PpuAmbient */
/* @var $model backend\models\PpuaMonitoringPoint */

$this->title = AppLabels::MONITORING_POINT;
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::AIR_POLLUTION_CONTROL, AppLabels::AMBIENT), 'url' => ['/ppu-ambient/index', '_ppId' => $ppuaModel->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuaModel->sector->sector_name, $ppuaModel->powerPlant->pp_name), 'url' => ['/ppu-ambient/view', 'id' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu-ambient/update", 'id' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppua-monitoring-point-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'ppuaId' => $ppuaModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ppua_monitoring_location',
            'ppua_code_location',
            'ppua_env_doc_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
