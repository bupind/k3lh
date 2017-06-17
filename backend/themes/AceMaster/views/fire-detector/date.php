<?php

use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\FdCheckDate */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $monthModel backend\models\FcdDetail */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FDD_DATE);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FDD_DATE), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php
$form = ActiveForm::begin([
    'id' => 'fd-check-date-form',
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
$index = 0;
$startDate = new \DateTime();
$startDate->setDate(2000, 1, 1);
?>

<div class="fd-check-date-form">

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-12">
                <div class="widget-box">
                    <div class="widget-header text-center">
                        <h4 class="widget-title"><?= "Tanggal Pengecekan" ?></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <fieldset>
                                <?php
                                echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                                echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                                foreach ($monthModel as $keyM => $month) {
                                    if (!$model->getIsNewRecord()) {
                                        echo $form->field($month, "[$keyM]id")->hiddenInput()->label(false);
                                        echo $form->field($month, "[$keyM]fd_check_date_id")->hiddenInput()->label(false);
                                    }

                                    echo $form->field($month, "[$keyM]fcd_date", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE, 'options' => ['class' => 'col-xs-12 col-sm-2']])
                                        ->widget(
                                            DatePicker::className(), [
                                                'model' => $model,
                                                'attribute' => "[$keyM]fcd_date",
                                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd MM yyyy',
                                                    'todayHighlight' => true
                                                ]
                                            ]
                                        )
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
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>