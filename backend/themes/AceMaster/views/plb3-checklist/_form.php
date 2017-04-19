<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Checklist */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'plb3-checklist-form',
    'options' => [
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

<div class="row plb3-checklist-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'plb3c_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY. ' text-right', 'disabled' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::CHECKLIST . " " . AppLabels::TPS , ['/plb3-checklist-detail', 'pct' => AppConstants::FORM_TYPE_TPS, 'plb3cId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::CHECKLIST . " " . AppLabels::LANDFILL, ['/plb3-checklist-detail', 'pct' => AppConstants::FORM_TYPE_LF, 'plb3cId' => $model->id], ['class' => 'btn btn-sm btn-primary']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::CHECKLIST . " " . AppLabels::THIRDPARTY, ['/plb3-checklist-detail', 'pct' => AppConstants::FORM_TYPE_PK, 'plb3cId' => $model->id], ['class' => 'btn btn-sm btn-purple']); ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
