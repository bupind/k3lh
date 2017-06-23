<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
use kartik\widgets\DatePicker;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LoginHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::LOGIN_HISTORY;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-history-index">

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

                [
                    'attribute' => 'user_id',
                    'value' => 'user.username',
                    'filter' => User::map(new User(), 'username')
                ],
                [
                    'attribute' => 'username',
                    'filter' => false
                ],
                [
                    'attribute' => 'password',
                    'filter' => false
                ],
                'remark',
                'ip_address',
                [
                    'attribute' => 'created_at',
                    'value' => 'created_at',
                    'format' => ['date', 'php:d-m-Y [H:i:s]'],
                    'filter' => DatePicker::widget([
                        'model' => $searchModel, 
                        'attribute' => 'created_at',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'options' => ['placeholder' => 'Tanggal'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                            'todayHighlight' => true
                        ]
                    ])
                ],
            ],
        ]); ?>
    </div>
</div>
