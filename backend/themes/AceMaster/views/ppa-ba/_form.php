<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitLinkButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppa */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'ppa-ba-form',
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

<div class="row ppa-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'ppaba_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY . ' text-right', 'disabled' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::MONITORING_POINT, ['/ppa-ba-monitoring-point', 'ppaBaId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::BM_REPORT_PARAMETER, ['/ppa-ba-report-bm', 'ppaBaId' => $model->id], ['class' => 'btn btn-sm btn-warning']); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'ppa-ba-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
