<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\AuthItem;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::ROLE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-index">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create-role'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
                [
                    'headerOptions' => ['width' => '30%'],
                    'attribute' => 'parent',
                    'filter' => Html::activeDropDownList($searchModel, 'parent', AuthItem::map(new AuthItem(), 'name', null, true, ['where' => [
                        ['type' => [3, 4]]
                    ]]), ['class' => 'chosen-select form-control'])
                ],
                'child',
            
                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['style' => 'width: 10%;'],
                    'template' => AppConstants::GRID_TEMPLATE_DELETE_ONLY
                ],
            ],
        ]); ?>
    </div>
</div>
