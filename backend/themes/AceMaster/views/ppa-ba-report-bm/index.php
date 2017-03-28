<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpaBaMonitoringPoint;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaBaReportBmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppaBaModel \backend\models\PpaBa */

$this->title = AppLabels::BM_REPORT_PARAMETER;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA_BA, $ppaBaModel->getSummary()), 'url' => ['/ppa-ba/update', 'id' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-report-bm-index">

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
    
                [
                    'attribute' => 'ppa_ba_monitoring_point_id',
                    'value' => 'ppaBaMonitoringPoint.ppabamp_monitoring_point_name',
                    'filter' => Html::activeDropDownList($searchModel, 'ppa_ba_monitoring_point_id', PpaBaMonitoringPoint::map(new PpaBaMonitoringPoint(), 'ppabamp_monitoring_point_name', null, true, [
                        'andWhere' => [
                            ['ppa_ba_id' => $ppaBaModel->id]
                        ]
                    ]), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'ppabar_param_code',
                    'value' => 'ppabar_param_code_desc'
                ],
                'ppabar_qs_1',
                'ppabar_qs_ref',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
