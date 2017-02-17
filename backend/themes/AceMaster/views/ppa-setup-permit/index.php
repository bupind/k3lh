<?php

use common\vendor\AppLabels;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaSetupPermitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ppaModel \backend\models\Ppa */

$this->title = AppLabels::SETUP_POINT_PERMIT;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s - %s - %s', AppLabels::PPA, $ppaModel->sector->sector_name, $ppaModel->powerPlant->pp_name, $ppaModel->ppa_year), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-setup-permit-index">

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
                
                'ppasp_wastewater_source',
                'ppasp_setup_point_name',
                'ppasp_coord_ls',
                'ppasp_coord_bt',
                'ppasp_permit_number',
                
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
