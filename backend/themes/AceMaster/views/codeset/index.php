<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CodesetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::CODESET;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codeset-index">

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
            'tableOptions' => ['class' => 'table table-striped table-responsive table-hover table-vcenter'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'cset_name',
                'cset_code',
                'cset_value',
                'cset_order',
                [
                    'attribute' => 'cset_description',
                    'headerOptions' => ['style' => 'width: 300px;'],
                    'filter' => false
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ]
        ]); ?>
    </div>
    
</div>
