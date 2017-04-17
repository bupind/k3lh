<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3BalanceSheet */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'plb3-balace-sheet-form',
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

<div class="row plb3-balace-sheet-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'plb3_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY. ' text-right', 'disabled' => true])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>

</div>

<hr/>

<div class="row">
    <div class="col-xs-12 center">
        <div class="btn-group">
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::LB3 . " " . AppLabels::DOMINANT . " di " . AppLabels::ASH_DISPOSAL , ['/plb3-balance-sheet-detail', 'bst' => AppConstants::FORM_TYPE_AD, 'plb3bsId' => $model->id], ['class' => 'btn btn-sm btn-success']); ?>
            <?= Html::a('<i class="ace-icon fa fa-bars"></i> ' . AppLabels::LB3 ." ". AppLabels::NON ." ". AppLabels::DOMINANT ." ". AppLabels::WAREHOUSE ." ". AppLabels::LB3, ['/plb3-balance-sheet-detail', 'bst' => AppConstants::FORM_TYPE_GD, 'plb3bsId' => $model->id], ['class' => 'btn btn-sm btn-primary']); ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
