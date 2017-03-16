<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\PpaSetupPermit;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaReportBmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppaModel \backend\models\Ppa */

$this->title = AppLabels::BM_REPORT_PARAMETER;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-report-bm-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'ppaId' => $ppaModel->id], ['class' => 'btn btn-sm btn-success']) ?>
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
                    'attribute' => 'ppa_setup_permit_id',
                    'value' => 'ppaSetupPermit.ppasp_setup_point_name',
                    'filter' => Html::activeDropDownList($searchModel, 'ppa_setup_permit_id', PpaSetupPermit::map(new PpaSetupPermit(), 'ppasp_setup_point_name', null, true, [
                        'andWhere' => [
                            ['ppa_id' => $ppaModel->id]
                        ]
                    ]), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'ppar_param_code',
                    'value' => 'ppar_param_code_desc'
                ],
                'ppar_qs_1',
                'ppar_qs_ref',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
