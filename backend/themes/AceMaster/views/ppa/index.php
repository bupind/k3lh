<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Sector;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use backend\assets\PPAAsset;

PPAAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */
/* @var $model backend\models\Ppa */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::WATER_POLLUTION_CONTROL, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
$actionColumn = Yii::$container->get('yii\grid\ActionColumn');
$buttons = array_merge($actionColumn->buttons, [
    'export' => function ($url, $model) {
        return Html::a('<i class="ace-icon fa fa-cloud-download bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', 'id' => $model->id], ['class' => 'btn btn-xs', 'data' => ['method' => 'post']]);
    },
    'export_xs' => function ($url, $model) {
        return Html::a('<span class="blue"><i class="ace-icon fa fa-cloud-download bigger-120"></i></span>', ['export', 'id' => $model->id], ['class' => 'tooltip-warning', 'data-rel' => 'tooltip', 'data-original-title' => AppLabels::BTN_EXPORT, 'data' => ['method' => 'post']]);
    },
]);
$template = Yii::t('app', \common\vendor\AppConstants::GRID_TEMPLATE_DEFAULT_EXTRA, ['additional_buttons' => '{export}', 'additional_buttons_xs' => '<li>{export_xs}</li>']);
?>
<div class="ppa-index">

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
                            'id' => 'ppa-ba-form',
                            'options' => [
                                'class' => 'form-inline',
                                'role' => 'form'
                            ],
                        ]); ?>
    
                        <?php

                        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                        echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                        echo $form->field($model, 'ppa_year')
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
    <hr />

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'ppa_year',
    
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
