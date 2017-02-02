<?php

use common\vendor\AppLabels;
use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkingPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $wpt string */

$this->title = sprintf('%s %s', AppLabels::WORKING_PLAN, $title);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-plan-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'wpt' => $wpt], ['class' => 'btn btn-sm btn-success']) ?>
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
                'wp_year',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
