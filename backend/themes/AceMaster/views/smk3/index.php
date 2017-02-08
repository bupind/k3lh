<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Smk3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf("%s %s", AppLabels::DATA_FORM, AppLabels::SMK3);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smk3-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']); ?>
        </div>
    </div>

    <hr/>
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
            'smk3_year',
            'smk3_semester',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
