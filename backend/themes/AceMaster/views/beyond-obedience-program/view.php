<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceProgram */
/* @var $bopt string */
/* @var $title string */

$this->title = sprintf("%s %s", AppLabels::YEAR, $model->bop_year);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', '_ppId' => $model->power_plant_id, 'bopt' => $model->bop_form_type_code]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'beyond-obedience-program-view',
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

<div class="beyond-obedience-program-view">

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
                        'bop_form_type_code',
                        'bop_year',
                    ],
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>

    <hr/>

    <div class="row">
        <table id="table-bop" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th class="center" width="2%">
                    <?= AppLabels::NUMBER_SHORT ?>
                </th>
                <th class="center" width="55%">
                    <?= sprintf("%s %s", AppLabels::PROGRAM, $title) ?>
                </th>
                <th class="center" width="15%">
                    <?= sprintf("%s %s %s", AppLabels::RESULT, AppLabels::ABSOLUTE, $title) ?>
                </th>
                <th class="center" width="10%">
                    <?= AppLabels::UNIT ?>
                </th>
                <th width="1%">

                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model->bopDetails as $keyD => $detail) : ?>
                <tr>
                    <td class="center">
                        <?= $index + 1 ?>
                    </td>
                    <td>
                        <?= $detail->bopd_program ?>
                    </td>
                    <td>
                        <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "B$keyD", "data-formula" => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                        <?=  $form->field($detail, "[$keyD]bopd_result")->hiddenInput(['data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                    </td>
                    <td>
                        <?= $detail->bopd_unit_code_desc ?>
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
                    <?= Html::textInput("totalResult",null,[ "data-cell" => "Z1", "data-formula" => "SUM(B0:B999)", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO,'class' => 'form-control text-right', 'disabled' => true]) ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id, 'bopt' => $model->bop_form_type_code], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id, 'bopt' => $model->bop_form_type_code], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'bopt' => $model->bop_form_type_code, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
