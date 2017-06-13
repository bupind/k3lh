<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use backend\models\Codeset;
use kartik\date\DatePicker;
use backend\assets\WorkingEnvDataAsset;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\WorkingEnvData */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $detailModel backend\models\WevDetail[] */

WorkingEnvDataAsset::register($this);
$baseUrl = Url::base();

?>
<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'working-env-data-form',
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
?>

<div class="working-env-data-form">

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <?php

            echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
            echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

            echo $form->field($powerPlantModel->sector, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' => 'form-control text-center', 'disabled' => true])
                ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($powerPlantModel, 'pp_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput([ 'class' =>  'form-control text-center', 'disabled' => true])
                ->label(AppLabels::POWER_PLANT, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);



            echo $form->field($model, 'wed_test_date', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->widget(
                    DatePicker::className(), [
                        'model' => $model,
                        'attribute' => 'wed_test_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd MM yyyy',
                            'todayHighlight' => true
                        ]
                    ]
                )
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "wed_work_area", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            echo $form->field($model, "wed_executor", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
                ->textInput(['maxlength' => true, 'class' => 'form-control'])
                ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-work-env-data" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th class="center" width="25%">
                        <?= AppLabels::PARAMETER ?>
                    </th>
                    <th class="center" width="10%">
                        <?= AppLabels::UNIT ?>
                    </th>
                    <th class="center" width="15%">
                        <?= AppLabels::QUALITY_STANDARD ?>
                    </th>
                    <th class="center">
                        <?= AppLabels::TEST_RESULT ?>
                    </th>
                    <th width="3%">

                    </th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailModel as $keyD => $detail) : ?>
                        <tr>
                            <td>
                                <?php if (!$model->getIsNewRecord()){
                                    echo $form->field($detail, "[$keyD]id")->hiddenInput()->label(false);
                                }
                                ?>
                                <?= $form->field($detail, "[$keyD]wevd_parameter", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(false); ?>
                            </td>
                            <td>
                                <?= $form->field($detail, "[$keyD]wevd_unit_code", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                    ->dropDownList(Codeset::customMap(AppConstants::CODESET_WEDD_UNIT_CODE, 'cset_value'), ['class' => 'input-big form-control'])
                                    ->label(false); ?>
                            </td>

                            <td>
                                <?= $form->field($detail, "[$keyD]wevd_qs_display", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right', 'data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO])
                                    ->label(false); ?>

                                <?=  $form->field($detail, "[$keyD]wevd_qs")->hiddenInput(['data-cell' => "B$keyD", 'data-formula' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                            </td>

                            <td>
                                <?= $form->field($detail, "[$keyD]wevd_test_result", ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_PLAIN_NO_LABEL])
                                    ->textInput(['maxlength' => true, 'class' => 'form-control'])
                                    ->label(false); ?>
                            </td>

                            <?php if (!$model->getIsNewRecord()) { ?>
                                <td>
                                    <?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $detail->id, 'data-controller' => 'wev-detail']); ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-8">
            <label for="test" class="col-sm-3 control-label"><?= AppLabels::BTN_ADD ?></label>
            <?= Html::textInput('attr_text', null, ['id' => 'add', 'class' => 'col-sm-4']); ?>
            <?= Html::button('Go',['id' => 'addButton', 'class' => 'btn btn-info btn-sm col-sm-2']); ?>
        </div>
    </div>

    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_ppId' => $powerPlantModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
