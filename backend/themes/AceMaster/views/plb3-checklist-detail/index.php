<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Codeset;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3ChecklistDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $plb3c_model backend\models\Plb3BalanceSheet */
/* @var $pct string */

$this->title = sprintf('%s %s %s', AppLabels::CHECKLIST, AppLabels::WASTE, Codeset::getCodesetValue(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE, $pct) );
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s %s", AppLabels::CHECKLIST, AppLabels::WASTE), 'url' => ['/plb3-checklist/index', '_ppId' => $plb3c_model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $plb3c_model->sector->sector_name, $plb3c_model->powerPlant->pp_name), 'url' => ['/plb3-checklist/view', 'id' => $plb3c_model->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/plb3-checklist/update", 'id' => $plb3c_model->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['plb3-checklist-detail/update', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['plb3-checklist-detail/update', 'plb3cId' => $model->plb3Checklist->id, 'pct' => $model->plb3cd_form_type_code, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'view' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['view', 'pct' => $model->plb3cd_form_type_code, 'plb3cId' => $model->plb3Checklist->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'pct' => $model->plb3cd_form_type_code, 'plb3cId' => $model->plb3Checklist->id, 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
]);
?>
<div class="plb3-checklist-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'plb3cId' => $plb3c_model->id, 'pct' => $pct], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plb3cd_company_name',
            'plb3cd_industrial_sector',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
