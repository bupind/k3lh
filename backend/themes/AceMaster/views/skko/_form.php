<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\SubmitButton;
use kartik\widgets\DatePicker;
use common\components\helpers\Converter;
use backend\assets\SkkoAsset;
use yii\helpers\Url;

SkkoAsset::register($this);
$baseUrl = Url::base();


/* @var $this yii\web\View */
/* @var $model backend\models\Skko */
/* @var $form yii\widgets\ActiveForm */
/* @var $sectorModel backend\models\Sector */
/* @var $detailModel backend\models\SkkoDetail[] */
$index = 1;
?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'skko-form',
    'options' => [
        'class' => 'calx form-horizontal',
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

<div class="row skko-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $sectorModel->id])->error(false)->label(false);

        echo $form->field($sectorModel, 'sector_name', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput([ 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY . ' text-left', 'disabled' => true])
            ->label(AppLabels::SECTOR, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        echo $form->field($model, 'skko_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY ])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <table id="table-skko" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
            <thead>
                <tr>
                    <th class="text-center" width="5%"><?= AppLabels::NUMBER_SHORT ?></th>
                    <th class="text-center" width="40%"><?= AppLabels::SKKO_NUMBER ?></th>
                    <th class="text-center" width="20%"><?= AppLabels::DATE ?></th>
                    <th class="text-center"><?= AppLabels::DOCUMENTS ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($detailModel as $keyD => $skkoDetail) : ?>
                <tr>
                    <td class="text-center"> <?= $index ?>
                        <?php if (!$model->getIsNewRecord()) { ?>
                        <?= $form->field($skkoDetail, "[$keyD]id")->hiddenInput()->label(false); ?></td>
                    <?php } ?>
                    <td>
                        <?= $form->field($skkoDetail, "[$keyD]skko_number", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->textInput(['maxlength' => true, 'class' => 'form-control'])
                            ->label(false); ?>
                    </td>
                    <td>
                        <?= $form->field($skkoDetail, "[$keyD]skko_date", ['template' => AppConstants::ACTIVE_FORM_WIDGET_TEMPLATE])
                            ->widget(
                                DatePicker::className(), [
                                    'model' => $model,
                                    'attribute' => "[$keyD]skko_date",
                                    'type' => DatePicker::TYPE_INPUT,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => true
                                    ]
                                ]
                            )
                            ->label(false); ?>
                    </td>
                    <td>
                        <?= Converter::attachment($skkoDetail->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $keyD]); ?>
                    </td>
                    <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove', 'data-id' => $skkoDetail->id, 'data-controller' => 'skko-detail']); ?></td>
                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-sm-offset-8">
        <label for="test" class="col-sm-3 control-label"><?= AppLabels::BTN_ADD ?></label>
        <?= Html::textInput('attr_text', null, ['id' => 'add', 'class' => 'col-sm-4']); ?>
        <?= Html::button('Go',['id' => 'addButton1', 'class' => 'addButtonClass btn btn-info btn-sm col-sm-2']); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?= SubmitButton::widget(['backAction' => ['index', '_sId' => $sectorModel->id], 'isNewRecord' => $model->isNewRecord, 'widget' => true]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

