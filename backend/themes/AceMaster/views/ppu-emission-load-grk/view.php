<?php

use yii\helpers\Html;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuEmissionLoadGrk */

$this->title = $this->title = sprintf('%s %s %s %s', AppLabels::BTN_VIEW, AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK, $model->ppuEmissionSource->ppues_name);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK), 'url' => ['index', 'ppuId' => $model->ppuEmissionSource->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppuEmissionSource->ppues_name];
?>

<?php $form = ActiveForm::begin([
    'id' => 'ppu-emission-load-grk-form-view',
    'options' => [
        'class' => 'form-horizontal calx',
        'role' => 'form',
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div',
        ]
    ]
]); ?>

<div class="ppu-emission-load-grk-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-10">
            <h3 class="header smaller lighter green"><?= sprintf("%s %s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK, $model->ppuEmissionSource->ppues_name); ?></h3>
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'ppu_emission_source_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppuEmissionSource->ppues_name],
                    ]
                ]
            ]); ?>
        </div>
        <?php foreach ($model->ppuEmissionLoadGrkCalcs as $key => $pCalc) { ?>
            <div class="col-xs-12 col-md-5">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="header smaller lighter green"><?= sprintf("%s %s %s %s", AppLabels::EMISSION_LOAD_CALCULATION, AppLabels::GRK, AppLabels::YEAR, $pCalc->ppueglc_year); ?></h3>
                        <?= DetailView::widget([
                            'model' => $pCalc,
                            'options' => [
                                'excluded' => [
                                    'ppu_emission_load_grk_id',
                                    'ppueglc_year',
                                ]
                            ]
                        ]); ?>
                        <?php
                            echo $form->field($pCalc, "[$key]ppueglc_coal_usage")
                                ->hiddenInput(['data-cell' => "A$key"])
                                ->label(false);

                            echo $form->field($pCalc, "[$key]ppueglc_carbon_content")
                                ->hiddenInput(['data-cell' => "B$key"])
                                ->label(false);

                            echo $form->field($pCalc, "[$key]ppueglc_carbon_actual_content")
                                ->hiddenInput(['data-cell' => "C$key"])
                                ->label(false);

                            echo $form->field($pCalc, "[$key]ppueglc_mw_carbondioxyde")
                                ->hiddenInput(['data-cell' => "D$key"])
                                ->label(false);

                            echo $form->field($pCalc, "[$key]ppueglc_anc")
                                ->hiddenInput(['data-cell' => "E$key"])
                                ->label(false);

                            echo $form->field($pCalc, "[$key]ppueglc_oxidation_factor")
                                ->hiddenInput(['data-cell' => "F$key"])
                                ->label(false);

                        ?>
                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name info-large"><?= AppLabels::EMISSION_LOAD?></div>
                                <div class="profile-info-value"><?= Html::label("", null,['data-cell' => "G$key", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO_DEC, 'data-formula' => "A$key*C$key*F$key*D$key/E$key", 'class' => 'control-label'] ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'ppuId' => $model->ppuEmissionSource->ppu_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'ppuId' => $model->ppuEmissionSource->ppu_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
