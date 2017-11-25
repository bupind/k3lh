<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\K3SupervisionDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $ksId int */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("Form %s %s", AppLabels::FORM_K3_SUPERVISION_DETAIL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_K3_SUPERVISION, 'url' => ['k3-supervision/index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['k3-supervision-detail/update', '_ppId' => $model->k3Supervision->powerPlant->id, 'id' => $model->id, 'ksId' => $model->k3_supervision_id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['k3-supervision-detail/update', '_ppId' => $model->k3Supervision->powerPlant->id, 'id' => $model->id, 'ksId' => $model->k3_supervision_id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
]);
?>
<div class="k3-supervision-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id, 'ksId' => $ksId], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ksd_date',
            'ksd_finding',
            'ksd_officer_action',
            'ksd_response',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
