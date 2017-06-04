<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeyondObedienceProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $bopt string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */

$this->title = sprintf("Form %s %s", $title, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['beyond-obedience-program/update', '_ppId' => $model->powerPlant->id, 'bopt' => $model->bop_form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['beyond-obedience-program/update', '_ppId' => $model->powerPlant->id, 'bopt' => $model->bop_form_type_code, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'view' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['view', 'bopt' => $model->bop_form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'bopt' => $model->bop_form_type_code, 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
]);
?>
<div class="beyond-obedience-program-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'bopt' => $bopt, '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bop_year',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
