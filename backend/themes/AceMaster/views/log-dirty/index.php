<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use kartik\widgets\DatePicker;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogDirtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::LOG_DIRTY;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-dirty-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_DELETE_ALL, ['delete-all'], ['class' => 'btn btn-sm btn-danger', 'data' => ['method' => 'post', 'confirm' => AppLabels::ALERT_CONFIRM_DELETE_ALL]]); ?>
        </div>
    </div>
        
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'data_id',
                'controller',
                'model',
                'label',
                'original_value',
                'changed_value',
                [
                    'attribute' => 'created_by',
                    'value' => 'createdByUsername',
                    'filter' => User::map(new User(), 'username')
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d-m-Y [H:i:s]'],
                    'filter' => DatePicker::widget([
                        'model' => $searchModel, 
                        'attribute' => 'created_at',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'options' => ['placeholder' => 'Tanggal'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]
                    ])
                ],
            ],
        ]); ?>
    </div>
</div>
