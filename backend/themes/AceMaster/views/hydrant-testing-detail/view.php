<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantTestingDetail */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->htd_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_HYDRANT_TESTING_DETAIL), 'url' => ['index', '_ppId' => $model->hydrantTesting->power_plant_id, 'htId' => $model->hydrant_testing_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hydrant-testing-detail-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s", $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => ['hydrant_testing_id']
                ]
            ]);
            ?>
        </div>
    </div>

    <?php
    $form = ActiveForm::begin([
        'id' => 'hydrant-testing-detail-form',
        'options' => [
            'class' => 'calx form-horizontal',
            'role' => 'form'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . 'Electrical Pump', '#electrical', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . 'Diesel Pump', '#diesel', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="electrical" class="tab-pane fade active in">
                        <div class="row">
                            <?php foreach($model->htdMonthsElectrical as $key => $value) : ?>
                                <div class="col-xs-12 col-md-4">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title"> <?= AppConstants::$monthsList[$key+1] ?> </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <fieldset>
                                                    <?php
                                                    echo Html::label("Tanggal", null, ['class' => 'col-md-3 control-label no-padding-right']);
                                                    ?>
                                                    <div class="col-md-9">
                                                        <?php
                                                        echo Html::textInput("Tanggal", $value->htdm_date, ['class' => 'form-control', 'readOnly' => true]);
                                                        ?>
                                                    </div>
                                                    <?php
                                                    echo $form->field($value, "[$key]htdm_pressure", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_flow_rate", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_vertical", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_horizontal", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                                    ?>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div id="diesel" class="tab-pane fade">
                        <div class="row">
                            <?php foreach($model->htdMonthsDiesel as $key => $value) : ?>
                                <div class="col-xs-12 col-md-4">
                                    <div class="widget-box">
                                        <div class="widget-header">
                                            <h4 class="widget-title"> <?= AppConstants::$monthsList[$key+1] ?> </h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <fieldset>
                                                    <?php
                                                    echo Html::label("Tanggal", null, ['class' => 'col-md-3 control-label no-padding-right']);
                                                    ?>
                                                    <div class="col-md-9">
                                                        <?php
                                                        echo Html::textInput("Tanggal", $value->htdm_date, ['class' => 'form-control', 'readOnly' => true]);
                                                        ?>
                                                    </div>
                                                    <?php
                                                    echo $form->field($value, "[$key]htdm_pressure", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_flow_rate", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_vertical", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                                                    echo $form->field($value, "[$key]htdm_horizontal", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'readOnly' => true])
                                                        ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                                                    ?>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <br/>
    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->hydrantTesting->power_plant_id, 'htId' => $model->hydrant_testing_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->hydrantTesting->power_plant_id, 'htId' => $model->hydrant_testing_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->hydrantTesting->power_plant_id, 'htId' => $model->hydrant_testing_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>
</div>
