<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpucemsReportBm;
use backend\models\PpuEmissionSource;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpucemsrbParameterReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuModel backend\models\Ppu */

$this->title = sprintf("%s %s", AppLabels::REPORT, AppLabels::PARAMETER);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['/ppu/index', '_ppId' => $ppuModel->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/view', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppucemsrb-parameter-report-index">

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
            'attribute' => 'ppucems_report_bm_id',
            'value' => 'ppucemsReportBm.ppucemsrb_parameter_code_desc',
            'filter' => Html::activeDropDownList($searchModel, 'ppucems_report_bm_id', PpucemsReportBm::map(new PpucemsReportBm(), 'ppucemsrb_parameter_code_desc', null, 'ppucemsrb_parameter_code', [
            ]), ['class' => 'chosen-select form-control'])
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
