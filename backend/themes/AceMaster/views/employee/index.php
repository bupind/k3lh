<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'name',
    'address',
    'phone',
    [
        'attribute' => 'status',
        'value' => 'employeeStatus',
        'filter' => \common\vendor\AppConstants::$yesNoList,
    ],
    ['class' => 'yii\grid\ActionColumn'],
];

?>

<div class="employee-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a('Tambah Karyawan', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]); ?>
    </div>
</div>
