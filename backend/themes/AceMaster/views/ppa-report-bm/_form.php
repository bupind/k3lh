<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use backend\models\PpaSetupPermit;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $ppaInletModels \backend\models\PpaInletOutlet[] */
/* @var $ppaOutletModels \backend\models\PpaInletOutlet[] */

?>

<div class="row ppa-report-bm-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal calx',
            'role' => 'form'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => 'div'
            ]
        ]
    ]);
    ?>

    <div class="col-xs-12 col-md-4">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::QUALITY_STANDARD; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'ppa_setup_permit_id', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(PpaSetupPermit::map(new PpaSetupPermit(), 'ppasp_setup_point_name'), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_param_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_param_unit_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_PPA_RBM_PARAM_UNIT_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppar_qs_1')->hiddenInput(['data-cell' => 'A1', 'data-formula' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);
                        echo $form->field($model, 'ppar_qs_2')->hiddenInput(['data-cell' => 'B1', 'data-formula' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN_DEC])->label(false);
                        echo $form->field($model, 'ppar_qs_1_display', [
                                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                    'separator' => '<i class="fa fa-bars"></i>',
                                    'input2' => $form->field($model, 'ppar_qs_2_display', ['template' => '{input}'])
                                        ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'BB1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                                        ->label(false)
                                ])
                            ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => 'AA1', 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC])
                            ->label($model->getAttributeLabel('ppar_qs_1_display'), ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', 'ppaId' => $ppaModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
