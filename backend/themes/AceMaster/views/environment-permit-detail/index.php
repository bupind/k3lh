<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EnvironmentPermitDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $epModel backend\models\EnvironmentPermit */

$this->title = sprintf("%s %s", AppLabels::REPORTING, $epModel->powerPlant->getSummary());
$this->params['breadcrumbs'][] = ['label' => AppLabels::DOCUMENT_VALIDATION, 'url' => ['/environment-permit/index', '_ppId' => $epModel->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $epModel->sector->sector_name, $epModel->powerPlant->pp_name), 'url' => ['/environment-permit/view', 'id' => $epModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/environment-permit/update", 'id' => $epModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['environment-permit-detail/update', 'epId' => $model->environmentPermit->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['environment-permit-detail/update', 'epId' => $model->environmentPermit->id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
]);
?>
<div class="environment-permit-detail-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'epId' => $epModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'ep_document_name',
                'ep_institution',
                'ep_date',

                [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => $buttons,
                ]
            ],
        ]); ?>
    </div>
</div>
