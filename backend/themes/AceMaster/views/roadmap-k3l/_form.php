<?php

use app\components\SubmitLinkButton;
use backend\assets\RoadmapAsset;
use backend\models\Codeset;
use backend\models\RoadmapK3lAttribute;
use backend\models\Sector;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

RoadmapAsset::register($this);
DatePicker::widget(['name' => 'hide', 'options' => ['class' => 'hidden']]);
$baseUrl = Url::base();

/* @var $this yii\web\View */
/* @var $model backend\models\RoadmapK3l */
/* @var $form yii\widgets\ActiveForm */
/* @var $powerPlantList backend\models\PowerPlant[] */
?>

<?php

echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'roadmap-form',
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

<div class="row roadmap-k3l-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php
        echo Html::activeHiddenInput($model, 'form_type_code');
        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        
        echo $form->field($model, 'k3l_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                    <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::TARGET, '#target', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                </li>
                <li>
                    <?= Html::a('<i class="green ace-icon fa fa-bars bigger-120"></i> ' . AppLabels::PROGRAM, '#program', ['data-toggle' => 'tab', 'aria-expanded' => 'true']); ?>
                </li>
            </ul>
            <div class="tab-content">
                <div id="target" class="tab-pane fade active in">
                    <table id="table-target" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                        <thead>
                        <tr>
                            <th width="70%"><?= AppLabels::TARGET   ; ?></th>
                            <th><?= AppLabels::VALUE; ?></th>
                            <th><?= AppLabels::ACTION; ?></th>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <?= Html::hiddenInput('attr_type_code', AppConstants::ATTRIBUTE_TYPE_TARGET, ['id' => 'target_attr_type_code']) ?>
                                <?= Html::textInput('attr_text', null, ['id' => 'target_attr_text', 'class' => 'form-control']); ?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model->roadmapK3lTargets as $key => $target): ?>
                            <tr>
                                <td>
                                    <?= Html::activeHiddenInput($target, "[$key]id"); ?>
                                    <?= $target->roadmapK3lAttribute->attr_text; ?>
                                </td>
                                <td>
                                    <?= Html::activeTextInput($target, "[$key]target_value", ['class' => 'form-control']); ?>
                                </td>
                                <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $target->id, 'data-controller' => 'roadmap-k3l-target']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="program" class="tab-pane fade">
                    <table id="table-program" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                        <thead>
                        <tr>
                            <th><?= AppLabels::PROGRAM; ?></th>
                            <th><?= AppLabels::WHEN; ?></th>
                            <th><?= AppLabels::WHERE; ?></th>
                            <th><?= AppLabels::WHO; ?></th>
                            <th><?= AppLabels::HOW_MANY; ?></th>
                            <th><?= AppLabels::HOW_MUCH; ?></th>
                            <th><?= AppLabels::ACTION; ?></th>
                        </tr>
                        <tr>
                            <th colspan="7" class="text-center">
                                <?= Html::radioList('attr_type_code', AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM, Codeset::customMap(AppConstants::CODESET_NAME_ATTRIBUTE_TYPE_CODE, 'cset_value', [
                                    'andWhere' => [
                                        ['!=', 'cset_code', AppConstants::ATTRIBUTE_TYPE_TARGET]
                                    ],
                                    'empty' => false
                                ]), ['item' => function ($index, $label, $name, $checked, $value) {
                                    return Html::tag('label', Html::radio($name, $checked, ['value' => $value]) . $label, ['class' => 'radio-inline']);
                                }, 'id' => 'program_attr_radio']); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7">
                                <?= Html::textInput('attr_text', null, ['id' => 'program_attr_text', 'class' => 'form-control']); ?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model->roadmapK3lItems as $key => $item): ?>
                            <?php if ($item->roadmapK3lAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM): ?>
                                <tr>
                                    <td>
                                        <?= Html::activeHiddenInput($item, "[$key]id"); ?>
                                        <?= $item->roadmapK3lAttribute->attr_text; ?>
                                    </td>
                                    <td><?php
                                        echo DatePicker::widget([
                                            'model' => $item,
                                            'attribute' => "[$key]item_value_when",
                                            'id' => 'date1',
                                            'type' => DatePicker::TYPE_INPUT,
                                            'options' => ['class' => 'form-control'],
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-mm-yyyy',
                                                'todayHighlight' => 'true'
                                            ],
                                        ])
                                        ?></td>
                                    <td><?= Html::activeTextarea($item, "[$key]item_value_where", ['class' => 'form-control']); ?></td>
                                    <td><?= Html::activeTextarea($item, "[$key]item_value_who", ['class' => 'form-control']); ?></td>
                                    <td><?= Html::activeTextarea($item, "[$key]item_value_how_many", ['class' => 'form-control']); ?></td>
                                    <td>
                                        <?= Html::activeHiddenInput($item, "[$key]item_value_how_much", ['data-format' => '0', 'data-cell' => "B$key", 'data-formula' => "A$key"]); ?>
                                        <?= Html::activeTextInput($item, "[$key]item_value_how_much_display", ['class' => 'form-control numbersOnly', 'data-format' => '0,0', 'data-cell' => "A$key"]); ?>
                                    </td>
                                    <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $item->id, 'data-controller' => 'roadmap-k3l-item']); ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <?= Html::activeHiddenInput($item, "[$key]id"); ?>
                                        <strong><?= $item->roadmapK3lAttribute->attr_text; ?></strong>
                                    </td>
                                    <td><?= Html::button(AppLabels::BTN_DELETE, ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $item->id, 'data-controller' => 'roadmap-k3l-item']); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'roadmap-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
