<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceComdev */
/* @var $bopt string */
/* @var $title string */

$this->title = sprintf("%s %s", AppLabels::YEAR, $model->boc_year);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', '_ppId' => $model->power_plant_id, 'boct' => $model->boc_form_type_code]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin([
    'id' => 'beyond-obedience-comdev-view',
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

<div class="beyond-obedience-comdev-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s %s", $title, $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'excluded' => [
                        'boc_form_type_code',
                        'boc_year',
                    ],
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ],
                    'extraAttributes' => [
                        'files' => Converter::attachments($model->attachmentOwners)
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <table id="table-boc" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th class="center" >
                    <?= AppLabels::NUMBER_SHORT ?>
                </th>
                <th class="center" >
                    <?= sprintf("%s %s", AppLabels::PROGRAM, $title) ?>
                </th>

                <th class="center" >
                    <?= AppLabels::PUBLIC_INCOME ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_IMPACT ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_EFFORT ?>
                </th>
                <th class="center" >
                    <?= AppLabels::BOC_BUDGET ?>
                </th>

                <th class="center" >
                    <?= AppLabels::UNIT ?>
                </th>
                <th width="1%">

                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model->bocDetails as $keyD => $detail) : ?>
                <tr>
                    <td class="center">
                        <?= $index + 1 ?>
                    </td>
                    <td>
                       <?= $detail->bocd_program ?>
                    </td>
                    <td>
                        <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "B$keyD", "data-formula" => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                        <?=  $form->field($detail, "[$keyD]bocd_budget")->hiddenInput(['data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "C$keyD", "data-formula" => "CC$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                        <?=  $form->field($detail, "[$keyD]bocd_budget")->hiddenInput(['data-cell' => "CC$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "D$keyD", "data-formula" => "DD$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                        <?=  $form->field($detail, "[$keyD]bocd_budget")->hiddenInput(['data-cell' => "DD$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "E$keyD", "data-formula" => "EE$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                        <?=  $form->field($detail, "[$keyD]bocd_budget")->hiddenInput(['data-cell' => "EE$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $detail->bocd_unit_code_desc ?>
                    </td>
                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <?= sprintf("%s %s", AppLabels::TOTAL, $title) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultB",null,[ "data-cell" => "Z1", "data-formula" => "SUM(B0:B999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultC",null,[ "data-cell" => "Z2", "data-formula" => "SUM(C0:C999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultD",null,[ "data-cell" => "Z3", "data-formula" => "SUM(D0:D999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td>
                    <?= Html::textInput("totalResultE",null,[ "data-cell" => "Z4", "data-formula" => "SUM(E0:E999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL,
                    'buttons' => [
                        'excel' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-purple btn-bold']),
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id, 'boct' => $model->boc_form_type_code], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id, 'boct' => $model->boc_form_type_code], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'boct' => $model->boc_form_type_code, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
