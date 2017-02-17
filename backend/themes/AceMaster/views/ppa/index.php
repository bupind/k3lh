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
/* @var $powerPlantList \backend\models\PowerPlant[] */

$this->title = AppLabels::WATER_POLLUTION_CONTROL;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
        
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"><?= AppLabels::BTN_ADD; ?></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main row">
                        <?php $form = ActiveForm::begin([
                            'id' => 'ppa-form',
                            'options' => [
                                'class' => 'form-inline',
                                'role' => 'form'
                            ],
                            'fieldConfig' => [
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'form-group col-xs-12 col-md-4'
                                ]
                            ]
                        ]); ?>
    
                        <?php
    
                        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list input-small chosen-select form-control'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9])
                            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => 'input-small chosen-select form-control'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                        echo $form->field($model, 'ppa_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
    
                        ?>
                        
                        <div class="form-actions col-xs-12 center no-margin no-padding">
                            <div class="space-6"></div>
                            <?= Html::submitButton('<i class="ace-icon fa fa-check bigger-110"></i> ' . AppLabels::BTN_ADD, ['class' => 'btn btn-info btn-sm']); ?>
                        </div>
    
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
                
                [
                    'attribute' => 'sector_id',
                    'value' => 'sector.sector_name',
                    'filter' => Html::activeDropDownList($searchModel, 'sector_id', Sector::map(new Sector(), 'sector_name'), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'power_plant_id',
                    'value' => 'powerPlant.pp_name'
                ],
                'ppa_year',
                
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
