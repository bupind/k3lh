<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Sector;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;
use backend\assets\PPUAAsset;

PPUAAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\models\PpuAmbient */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantList backend\models\PowerPlant[] */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'ppua-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

<div class="row ppu-ambient-form">

    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'ppua_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::MONITORING_POINT, ['/ppua-monitoring-point', 'ppuaId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::PARAMETER_OBLIGATION, ['/ppua-parameter-obligation', 'ppuaId' => $model->id], ['class' => 'btn btn-sm btn-warning']); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'ppua-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

