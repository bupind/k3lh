<?php

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoringDetail */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */

?>
<?php
$form = ActiveForm::begin([
    'id' => 'k3-supervision-detail-form',
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

<div class="p3k-monitoring-detail-form">

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> <?= AppLabels::FORM_P3K_MONITORING_DETAIL ?> </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'p3k_monitoring_id')->hiddenInput()->error(false)->label(false);

                            echo $form->field($model, "pmd_value", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, "pmd_standard_amount", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, 'pmd_ref', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textarea(['class' => AppConstants::ACTIVE_FORM_CLASS_TEXTAREA])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> Jumlah Isi Kotak P3K </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            foreach ($pmdmMonth as $key => $value) {

                                echo $form->field($value, "[$key]pmdm_month")->hiddenInput(['value' => $startDate->format('m')])->label(false);
                                if (!$model->getIsNewRecord()) {
                                    echo $form->field($value, "[$key]id")->hiddenInput()->label(false);
                                }
                                echo $form->field($value, "[$key]pmdm_value", [
                                    'template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE,
                                    'options' => ['class' => 'col-xs-12 col-sm-4']
                                ])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly', 'data-cell' => "B$key"])
                                    ->label($startDate->format('M'), ['class' => '']);

                                $startDate->add(new \DateInterval('P1M'));
                            }
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
