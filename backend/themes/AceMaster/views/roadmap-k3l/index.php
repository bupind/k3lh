<?php

use common\vendor\AppLabels;
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoadmapK3lSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $rmt string */

$this->title = sprintf('%s %s', AppLabels::ROADMAP, $title);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-k3l-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'rmt' => $rmt], ['class' => 'btn btn-sm btn-success']) ?>
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
                    'attribute' => 'sector_id',
                    'value' => 'sector.sector_name',
                    'filter' => Html::activeDropDownList($searchModel, 'sector_id', Sector::map(new Sector(), 'sector_name'), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'power_plant_id',
                    'value' => 'powerPlant.pp_name'
                ],
                'k3l_year',
                
                ['class' => 'yii\grid\ActionColumn',]
            ],
        ]); ?>
    </div>
</div>
