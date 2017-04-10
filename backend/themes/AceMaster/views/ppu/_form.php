<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;
use backend\assets\PPUAsset;

PPUAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantList backend\models\PowerPlant[] */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-form',
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

<div class="row ppu-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'ppu_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY. ' text-right', 'disabled' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::EMISSION_SOURCE_INVENTORY, ['/ppu-emission-source', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::ADHERENCE ." ". AppLabels::BM_REPORT_PARAMETER, ['/ppu-parameter-obligation', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-primary']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::EMISSION_LOAD_CALCULATION, ['/ppu-emission-load-grk', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-default']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::TECHNICAL_PROVISION, ['/ppu-technical-provision', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-info']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::POLLUTION_LOAD, ['/ppu/pollution-load', 'id' => $model->id], ['class' => 'btn btn-sm btn-purple']); ?>
        </div>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::ADHERENCE ." ". AppLabels::BM_REPORT_PARAMETER . " " . AppLabels::CEMS, ['/ppucems-report-bm', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' .  AppLabels::REPORT." ". AppLabels::PARAMETER, ['/ppucemsrb-parameter-report', 'ppuId' => $model->id], ['class' => 'btn btn-sm btn-warning']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' .  AppLabels::EMISSION_LOAD_CALCULATION." ". AppLabels::CEMS, ['/ppu/emission-load-calc', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']); ?>
           </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'ppu-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
