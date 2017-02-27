<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpuaMonitoringPoint;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuaParameterObligationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuaModel backend\models\PpuAmbient */

$this->title = sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER), 'url' => ['/ppu-ambient/index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuaModel->sector->sector_name, $ppuaModel->powerPlant->pp_name), 'url' => ['/ppu-ambient/view', 'id' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu-ambient/update", 'id' => $ppuaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppua-parameter-obligation-index">

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

            [
                'attribute' => 'ppua_monitoring_point_id',
                'value' => 'ppuaMonitoringPoint.ppua_monitoring_location',
                'filter' => Html::activeDropDownList($searchModel, 'ppua_monitoring_point_id', PpuaMonitoringPoint::map(new PpuaMonitoringPoint(), 'ppua_monitoring_location', null, true, [
                    'andWhere' => [
                        ['ppu_ambient_id' => $ppuaModel->id]
                    ]
                ]), ['class' => 'chosen-select form-control'])
            ],
            [
                'attribute' => 'ppua_monitoring_point_id',
                'value' => 'ppuaMonitoringPoint.ppua_code_location',
            ],

            [
                'attribute' => 'ppuapo_parameter_code',
                'value' => 'ppuapo_parameter_code_desc'
            ],

            'ppuapo_qs',
            'ppuapo_qs_ref',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
