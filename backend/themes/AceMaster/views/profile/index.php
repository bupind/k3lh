<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::PROFILE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">
    
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
    
                'app_name',
                'master_email:email',
                'title_tag',
                [
                    'attribute' => 'active_status',
                    'value' => 'activeStatusDesc'
                ],
    
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
