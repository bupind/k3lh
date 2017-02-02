<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Employee;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'employee_id',
        'format' => 'raw',
        'value' => 'employeeLink',
        'filter' => Employee::map(new Employee(), 'name'),
    ],
    'username',
    ['class' => 'yii\grid\ActionColumn'],
];
?>

<div class="user-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]);?>
    </div>
</div>
