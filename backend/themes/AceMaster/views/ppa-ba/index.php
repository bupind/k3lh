<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaBaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */
/* @var $model backend\models\PpaBa */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::WATER_POLLUTION_CONTROL_BA, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-index">

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
                        
                        echo $form->field($model, 'ppaba_year')
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
                'ppaba_year',
                
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
