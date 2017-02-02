<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PowerPlantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::SECTOR;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="power-plant-index">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr />
    
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
                'pp_name',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
