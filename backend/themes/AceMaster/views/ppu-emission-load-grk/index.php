<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpuEmissionSource;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuEmissionLoadGrkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuModel backend\models\Ppu */

$this->title = sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['/ppu/index', '_ppId' => $ppuModel->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/view', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-emission-load-grk-index">

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

            [
                'attribute' => 'ppu_emission_source_id',
                'value' => 'ppuEmissionSource.ppues_name',
                'filter' => Html::activeDropDownList($searchModel, 'ppu_emission_source_id', PpuEmissionSource::map(new PpuEmissionSource(), 'ppues_name', null, true, [
                    'andWhere' => [
                        ['ppu_id' => $ppuModel->id]
                    ]
                ]), ['class' => 'chosen-select form-control'])
            ],

            'ppuelg_parameter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
