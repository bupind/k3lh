<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\WorkingEnvData */
/* @var $detailModel backend\models\WevDetail[] */

$this->title = sprintf("%s %s", AppLabels::YEAR, $model->wed_work_area);
$this->params['breadcrumbs'][] = ['label' => AppLabels::FORM_WORK_ENV_DATA, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'working-env-data-view',
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
<div class="working-env-data-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s %s", AppLabels::FORM_WORK_ENV_DATA, $this->title)) ?>
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
                </tr>
                </thead>
                <tbody>
                <?php foreach ($detailModel as $keyD => $detail) : ?>
                    <tr>
                        <td>
                            <?= $detail->wevd_parameter ?>
                        </td>
                        <td>
                            <?= $detail->wevd_unit_code_desc ?>
                        </td>

                        <td>
                            <?= Html::textInput("result[$keyD]", null,[ "data-cell" => "B$keyD", "data-formula" => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'form-control text-right', 'disabled' => true]) ?>

                            <?=  $form->field($detail, "[$keyD]wevd_qs")->hiddenInput(['data-cell' => "BB$keyD", 'data-format' => AppConstants::CALX_DATA_FORMAT_PLAIN])->label(false); ?>
                        </td>

                        <td>
                            <?= $detail->wevd_test_result ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
