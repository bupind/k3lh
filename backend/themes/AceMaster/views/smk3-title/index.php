<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Smk3TitleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::SMK3_TITLE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smk3-title-index">
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

            'sttl_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
