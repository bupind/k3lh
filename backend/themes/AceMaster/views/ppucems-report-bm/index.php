<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpuEmissionSource;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpucemsReportBmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuModel backend\models\Ppu */

$this->title = sprintf("%s %s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER, AppLabels::CEMS);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['/ppu/index', '_ppId' => $ppuModel->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/view', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppucems-report-bm-index">

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
            [
                'attribute' => 'ppu_emission_source_id',
                'value' => 'ppuEmissionSource.ppues_chimney_name',
                'label' => sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY),
            ],
            [
                'attribute' => 'ppucemsrb_parameter_code',
                'value' => 'ppucemsrb_parameter_code_desc'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
