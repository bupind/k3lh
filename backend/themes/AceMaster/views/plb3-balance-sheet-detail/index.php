<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Plb3BalanceSheetDetail;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3BalanceSheetDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $plb3bs_model backend\models\Plb3BalanceSheet */
/* @var $bst string */

$this->title = sprintf('%s %s %s', AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s %s", AppLabels::PERCENTAGE, AppLabels::BALANCE_SHEET), 'url' => ['/plb3-balance-sheet/index', '_ppId' => $plb3bs_model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', $plb3bs_model->sector->sector_name, $plb3bs_model->powerPlant->pp_name), 'url' => ['/plb3-balance-sheet/view', 'id' => $plb3bs_model->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ["/plb3-balance-sheet/update", 'id' => $plb3bs_model->id]];
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['plb3-balance-sheet-detail/update', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['plb3-balance-sheet-detail/update', 'plb3bsId' => $model->plb3BalanceSheet->id, 'bst' => $model->form_type_code, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'view' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-eye bigger-120"></i> ' . AppLabels::BTN_VIEW, ['view', 'bst' => $model->form_type_code, 'plb3bsId' => $model->plb3BalanceSheet->id, 'id' => $model->id], ['class' => 'btn btn-xs btn-success']);
    },
    'view_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span>', ['view', 'bst' => $model->form_type_code, 'plb3bsId' => $model->plb3BalanceSheet->id, 'id' => $model->id], ['class' => 'tooltip-info', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_VIEW]);
    },
]);
?>
<div class="plb3-balance-sheet-detail-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', 'plb3bsId' => $plb3bs_model->id, 'bst' => $bst], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plb3_waste_type',

            [
                'attribute' => 'plb3_waste_source_code',
                'value' => 'plb3_waste_source_code_desc',
                'filter' => Html::activeDropDownList($searchModel, 'plb3_waste_source_code', Plb3BalanceSheetDetail::map(new Plb3BalanceSheetDetail(), 'plb3_waste_source_code_desc', null, 'plb3_waste_source_code', [
                ]), ['class' => 'chosen-select form-control'])
            ],

            [
                'attribute' => 'plb3_waste_unit_code',
                'value' => 'plb3_waste_unit_code_desc',
                'filter' => Html::activeDropDownList($searchModel, 'plb3_waste_unit_code', Plb3BalanceSheetDetail::map(new Plb3BalanceSheetDetail(), 'plb3_waste_unit_code_desc', null, 'plb3_waste_unit_code', [
                ]), ['class' => 'chosen-select form-control'])
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
