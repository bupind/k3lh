<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedience */
/* @var $title string */
/* @var $boAspect backend\models\BoAssessmentAspect[] */

$this->title = sprintf("%s %s", AppLabels::YEAR, $model->bo_year);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', '_ppId' => $model->power_plant_id, 'bot' => $model->bo_form_type_code]];
$this->params['breadcrumbs'][] = $this->title;
$index = 0;
$criteriaValue = 0;
$existingValue = 0;
?>
<div class="beyond-obedience-view">

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
                        'bo_form_type_code',
                        'bo_year',
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
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th rowspan="2" class="text-center" width="20%">
                    <?= AppLabels::ASSESSMENT_ASPECT ?>
                </th>
                <th rowspan="2" class="text-center" width="40%">
                    <?= sprintf("Deskripsi %s", AppLabels::CRITERIA) ?>
                </th>
                <th rowspan="2" class="text-center" width="10%">
                    <?= sprintf("%s %s", AppLabels::VALUE, AppLabels::CRITERIA) ?>
                </th>
                <th colspan="2" class="text-center" width="30%">
                    Assessment
                </th>
            </tr>
            <tr>
                <th class="text-center" width="10%">
                    <?= AppLabels::VALUE ?>
                </th>
                <th class="text-center">
                    <?= AppLabels::DESCRIPTION ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($boAspect as $keyA => $aspect) : ?>
                <?php foreach($aspect->boasCriterias as $keyC => $criteria) : ?>
                    <tr>
                        <?php if($keyC == 0) : ?>
                            <td rowspan="<?= count($aspect->boasCriterias)?>">
                                <?= $aspect->boas_aspect ?>
                            </td>
                        <?php endif; ?>
                        <td>
                            <?= $criteria->boas_description ?>
                        </td>
                        <td class="text-right">
                            <?= $criteria->boas_value ?>
                            <?php $criteriaValue += floatval($criteria->boas_value); ?>
                        </td>
                        <?php foreach($model->boAssessments as $key => $assessment) :
                            if($criteria->id == $assessment->boas_criteria_id) : ?>
                                <td class="text-right">
                                    <?= $assessment->boa_value ?>
                                    <?php $existingValue += floatval($assessment->boa_value); ?>
                                </td>
                                <td>
                                    <?=  $assessment->boa_ref ?>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                    <?php $index++ ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td class="text-center"> <?= sprintf("%s (%s)", AppLabels::VALUE, AppLabels::CRITERIA) ?></td>
                <td class="text-right"><?= $criteriaValue ?></td>
                <td class="text-right"><?= number_format($existingValue,2) ?></td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center"> <?= sprintf("%s (Existing)", AppLabels::VALUE) ?> </td>
                <td class="text-right"><?= intval($existingValue) ?></td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center"><?= sprintf("%% GAP"); ?></td>
                <?php if($criteriaValue != 0) { ?>
                    <td class="text-right"><?= sprintf("%s %%",number_format($existingValue/$criteriaValue*100,2)); ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <td class="text-center"><?= sprintf("%s (Perbaikan)", AppLabels::VALUE) ?></td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center"><?= sprintf("%% Pemenuhan") ?> </td>
            </tr>
            </tbody>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id, 'bot' => $model->bo_form_type_code], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id, 'bot' => $model->bo_form_type_code], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'bot' => $model->bo_form_type_code, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
