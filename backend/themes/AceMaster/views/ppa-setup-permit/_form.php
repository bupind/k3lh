<?php

use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Codeset;
use kartik\date\DatePicker;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */
/* @var $form yii\widgets\ActiveForm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $ppaMonthModels \backend\models\PpaMonth[] */

?>

<div class="row ppa-setup-permit-form">
    <?php
    $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal',
            'role' => 'form',
            'enctype' => 'multipart/form-data',
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
                <h4 class="widget-title"><?= AppLabels::WASTE_WATER ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php
                        
                        echo $form->field($model, 'ppa_id')->hiddenInput(['value' => $ppaModel->id])->label(false);
                        echo $form->field($model, 'ppasp_wastewater_source', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppasp_setup_point_name', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppasp_coord_ls', [
                                'template' => Yii::t('app', AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE_INPUT_GROUP, [
                                    'separator' => '<i class="fa fa-map"></i>',
                                    'input2' => $form->field($model, 'ppasp_coord_bt', ['template' => '{input}'])
                                                    ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "BT (Cth: 05&deg; 31' 20,6)"])
                                                    ->label(false)
                                ])
                            ])
                            ->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => "LS (Cth: 05&deg; 31' 20,6)"])
                            ->label(AppLabels::COORDINATE, ['class' => '']);

                        echo $form->field($model, 'ppasp_wastewater_tech_code', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->dropDownList(Codeset::customMap(AppConstants::CODESET_WASTE_WATER_TECHNOLOGY_CODE), ['class' => 'chosen-select form-control'])
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-3">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::PERMIT; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php

                        echo $form->field($model, 'ppasp_permit_number', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppasp_permit_publisher', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control uppercase'])
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppasp_permit_publish_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ppasp_permit_publish_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);

                        echo $form->field($model, 'ppasp_permit_end_date', ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => 'ppasp_permit_end_date',
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => AppConstants::FORMAT_DATE_DATEPICKER,
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(null, ['class' => '']);
                        
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-5">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><?= AppLabels::CERTIFIED_NUMBER_TEST_RESULT; ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <fieldset>
                        <?php foreach ($ppaMonthModels as $key => $ppaMonth): ?>
                        <div class="col-xs-12 col-sm-4">
                            <?php

                            if (!$ppaMonth->isNewRecord) {
                                echo $form->field($ppaMonth, "[$key]id")->hiddenInput()->label(false);
                            }
                            echo $form->field($ppaMonth, "[$key]ppam_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                            echo $form->field($ppaMonth, "[$key]ppam_year")->hiddenInput(['value' => $startDate->format('Y')])->label(false);
                            
                            echo $form->field($ppaMonth, "[$key]ppam_cert_number", [
                                    'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                ])
                                ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly'])
                                ->label($startDate->format('M Y'), ['class' => '']);

                            if(empty($ppaMonth->attachmentOwner)) {
                                echo Converter::attachment($ppaMonth->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $key]);
                                echo '<div class="space-6"></div>';
                            } else {
                                echo Converter::attachmentExtLink('', $ppaMonth->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]);
                                echo '<div class="space-8"></div>';
                            }
                            
                            ?>
                        </div>
                        <?php $startDate->add(new \DateInterval('P1M')); endforeach; ?>
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
