<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Sector;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaturityLevelK3lSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = AppLabels::MATURITY_LEVEL_K3L;
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons,[
    'update' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['maturity-level-k3l/update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-xs btn-info']);
    },
    'update_xs' => function ($url, $model) {
        return Html::a('<span class="green"><i class="ace-icon fa fa-pencil bigger-120"></i></span>', ['maturity-level-k3l/update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'tooltip-success', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_UPDATE]);
    },
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-file-excel-o bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', 'id' => $model->id], ['class' => 'btn btn-xs btn-purple']);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="purple"><i class="ace-icon fa fa-file-excel-o bigger-120"></i></span>', ['export', 'id' => $model->id], ['class' => 'tooltip-purple', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT]);
    },

]);
$template = Yii::t('app', AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}', 'additional_buttons_xs' => '<li>{export_xs}</li>']);
?>
<div class="maturity-level-k3l-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create', '_ppId' => $powerPlantModel->id], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'sector_id',
                'value' => 'sector.sector_name',
                'filter' => Html::activeDropDownList($searchModel, 'sector_id', Sector::map(new Sector(), 'sector_name'), ['class' => 'chosen-select form-control'])
            ],
            'mlvl_quarter',
            'mlvl_year',

            [   'class' => 'yii\grid\ActionColumn',
                'template' => $template,
                'buttons' => $buttons,
            ],
        ],
    ]); ?>
</div>
