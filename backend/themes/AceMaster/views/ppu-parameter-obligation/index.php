<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuParameterObligationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppuModel backend\models\Ppu */

$this->title = sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::ADHERENCE, AppLabels::BM_REPORT_PARAMETER), 'url' => ['/ppu/index']];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $ppuModel->sector->sector_name, $ppuModel->powerPlant->pp_name), 'url' => ['/ppu/view', 'id' => $ppuModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/ppu/update/$ppuModel->id"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-parameter-obligation-index">

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

            'ppues_name',
            'ppu_emission_source_id',
            'ppupo_parameter_code',
            'ppupo_parameter_unit_code',
            'ppupo_qs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
