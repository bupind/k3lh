<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuCompulsoryMonitoredEmissionSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuModel backend\models\Ppu */

$this->title = AppLabels::ADHERENCE_POINT;
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['/ppu/index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/update', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-compulsory-monitored-emission-source-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'ppuId' => $ppuModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ppucmes_name',
            'ppucmes_chimney_name',
            'ppucmes_operation_time',
            [
                'attribute' => 'ppucmes_freq_monitoring_obligation_code',
                'value' => function ($searchModel){
                    return Codeset::getCodesetValue(AppConstants::CODESET_NAME_FREQ_MONITORING_OBLIGATION_CODE,$searchModel->ppucmes_freq_monitoring_obligation_code);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
