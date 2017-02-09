<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitLinkButton;
use common\vendor\AppConstants;
use backend\models\MaturityLevelTitle;
use backend\models\Codeset;
use yii\redactor\widgets\Redactor;
use backend\assets\CreateModalAsset;

CreateModalAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelQuestion */
/* @var $form yii\widgets\ActiveForm */
/* @var $maturityLevelTitleMdl \backend\models\MaturityLevelTitle */
?>

<?php
$form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
]);
?>

<div class="row maturity-level-question-form">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <?php
        echo $form->field($model, 'maturity_level_title_id', [
                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4_EXTRA, [
                    'extra' => Html::button(sprintf('<i class="ace-icon fa fa-plus bigger-110"></i>'), ['style' => 'margin-left: 5px;', 'class' => 'btn btn-xs btn-primary', 'data-toggle' => 'modal', 'data-target' => '#maturity-level-title-modal', 'data-model-name' => 'MaturityLevelQuestion']),
                    'wrapper_id' => 'input-maturity-level-title-wrapper'
                ])
            ])
            ->dropDownList(MaturityLevelTitle::map(new MaturityLevelTitle(), 'title_text'), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'q_unit_code', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_4])
            ->dropDownList(Codeset::customMap(AppConstants::CODESET_UNIT_CODE), ['class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'q_weight', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>
</div>

<hr />

<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h4 class="header green"><?= $model->getAttributeLabel('q_action_plan'); ?></h4>
        <?= $form->field($model, 'q_action_plan', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
            ->widget(Redactor::className(), [
                'clientOptions' => [
                    'imageUpload' => ['/redactor/upload/image'],
                    'imageUploadCallback' => new \yii\web\JsExpression("
                        function(image, json) {
                            image.addClass('img-responsive')
                        }
                    "),
                    'plugins' => ['imagemanager']
                ]
            ])
            ->label(false, ['class' => '']); ?>
    </div>
    <div class="col-xs-12 col-sm-6">
        <h4 class="header green"><?= $model->getAttributeLabel('q_criteria'); ?></h4>
        <?= $form->field($model, 'q_criteria', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
            ->widget(Redactor::className(), [
                'clientOptions' => [
                    'imageUpload' => ['/redactor/upload/image'],
                    'imageUploadCallback' => new \yii\web\JsExpression("
                        function(image, json) {
                            image.addClass('img-responsive')
                        }
                    "),
                    'plugins' => ['imagemanager']
                ]
            ])
            ->label(false, ['class' => '']); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'working-plan-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?= $this->render('/common/_modal_maturity_level_title', ['maturityLevelTitleMdl' => $maturityLevelTitleMdl]); ?>
