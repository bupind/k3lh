<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::AUTH_ASSIGNMENT;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
            
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'item_name',
                [
                    'attribute' => 'user_id',
                    'value' => 'user.username',
                    'filter' => User::map(new User(), 'username')
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['width' => '10%'],
                    'template' => '<div class="hidden-sm hidden-xs btn-group">{delete}</div><div class="hidden-md hidden-lg"><div class="inline pos-rel"><button data-position="auto" data-toggle="dropdown" class="btn btn-minier btn-primary dropdown-toggle" aria-expanded="false"><i class="ace-icon fa fa-cog icon-only bigger-110"></i></button><ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close"><li>{delete_xs}</li></ul></div></div>',
                ],
            ],
        ]); ?>
    </div>
</div>
