<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use backend\assets\PPUAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model backend\models\Ppu */
/* @var $powerPlantModel backend\models\PowerPlant */

PPUAsset::register($this);
$baseUrl = Url::base();

$this->title = sprintf('%s %s', AppLabels::AIR_POLLUTION_CONTROL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['ppu/export', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
    'export_cems' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT ." ". AppLabels::CEMS, ['ppu/export-cems', '_ppId' => $model->powerPlant->id,  'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_cems_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', $url, ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
]);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}{export_cems}', 'additional_buttons_xs' => '<li>{export_xs}</li><li>{export_cems_xs}</li>']);
?>
<div class="ppu-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title lighter"><?= AppLabels::BTN_ADD; ?></h5>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <?php $form = ActiveForm::begin([
                            'id' => 'ppu-form',
                            'options' => [
                                'class' => 'form-inline',
                                'role' => 'form'
                            ],
                        ]); ?>

                        <?php

                        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                        echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                        echo $form->field($model, 'ppu_year')
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                            ->label(null, ['class' => 'inline'])
                            ->error(false);



                        echo Html::submitButton('<i class="ace-icon fa fa-check bigger-110"></i> ' . AppLabels::BTN_ADD, ['class' => 'btn btn-info btn-sm']);
                        ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'ppu_year',

                [
                    'headerOptions' => ['style' => 'width: 25%;'],
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => $buttons,
                    'template' => $template,
                ],
            ],
        ]); ?>
    </div>
</div>
