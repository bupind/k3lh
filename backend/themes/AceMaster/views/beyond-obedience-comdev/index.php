<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeyondObedienceComdevSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $boct string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */

$this->title = sprintf("Form %s %s", $title, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['beyond-obedience-comdev/update', '_ppId' => $model->powerPlant->id, 'boct' => $model->boc_form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['beyond-obedience-comdev/update', '_ppId' => $model->powerPlant->id, 'boct' => $model->boc_form_type_code, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'view' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['view', 'boct' => $model->boc_form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'boct' => $model->boc_form_type_code, 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
]);
?>
<div class="beyond-obedience-comdev-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'boct' => $boct, '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'boc_year',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
