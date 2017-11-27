<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;

/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoring */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */

?>
<?php
$form = ActiveForm::begin([
    'id' => 'k3-supervision-form',
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

<div class="p3k-monitoring-form">

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title"> <?= AppLabels::FORM_K3L_ACTIVITY ?> </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <fieldset>
                            <?php

                            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['class' => 'form-control text-center', 'disabled' => true])
                                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, "pm_number", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

                            echo $form->field($model, "pm_location", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
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