<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use common\components\helpers\Converter;
use backend\assets\WorkingPlanAsset;

WorkingPlanAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPlan */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::WORKING_PLAN, $model->form_type_code_desc);
$this->params['subtitle'] = $model->sector->sector_name;
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::WORKING_PLAN, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-plan-view">

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
    
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'excluded' => ['form_type_code'],
            'converter' => [
                'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
            ]
        ]
    ]); ?>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-program" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <thead>
                <tr>
                    <th><?= AppLabels::PROGRAM; ?></th>
                    <th><?= AppLabels::RNR; ?></th>
                    <th><?= AppLabels::LOCATION; ?></th>
                    <th><?= AppLabels::PIC; ?></th>
                    <th><?= AppLabels::DOCUMENTS; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model->workingPlanDetails as $key => $detail): ?>
                    <?php if ($detail->workingPlanAttribute->attr_type_code == AppConstants::ATTRIBUTE_TYPE_PROGRAM_ITEM): ?>
                        <tr>
                            <td><?= $detail->workingPlanAttribute->attr_text; ?></td>
                            <td><?= $detail->wpd_rnr; ?></td>
                            <td><?= $detail->wpd_location; ?></td>
                            <td><?= $detail->wpd_pic; ?></td>
                            <td class="row">
                                <span class="col-sm-6"><?= Converter::attachment($detail->attachmentOwner); ?></span>
                                <span class="col-sm-6 text-right"><?= Html::button('<i class="ace-icon fa fa-arrow-down  bigger-110 icon-only"></i>', ['class' => 'btn btn-warning btn-minier btn-open-calendar']); ?></span>
                            </td>
                        </tr>
                        <tr style="display: none;">
                            <td colspan="5">
                                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?> working_plan">
                                    <tr>
                                        <?php for ($i=1; $i<=3; $i++): ?>
                                            <th colspan="4"><?= AppConstants::$monthsList[$i]; ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    <tr>
                                        <?php for ($i=1; $i<=3; $i++): ?>
                                            <?php for ($j=1; $j<=4; $j++): ?>
                                                <td class="progress_<?= isset($detail->monthly_progress[$i][$j]) ? $detail->monthly_progress[$i][$j] : ''; ?>"></td>
                                            <?php endfor; ?>
                                        <?php endfor; ?>
                                    </tr>

                                    <tr>
                                        <?php for ($i=4; $i<=6; $i++): ?>
                                            <th colspan="4"><?= AppConstants::$monthsList[$i]; ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    <tr>
                                        <?php for ($i=4; $i<=6; $i++): ?>
                                            <?php for ($j=1; $j<=4; $j++): ?>
                                                <td class="progress_<?= isset($detail->monthly_progress[$i][$j]) ? $detail->monthly_progress[$i][$j] : ''; ?>"></td>
                                            <?php endfor; ?>
                                        <?php endfor; ?>
                                    </tr>

                                    <tr>
                                        <?php for ($i=7; $i<=9; $i++): ?>
                                            <th colspan="4"><?= AppConstants::$monthsList[$i]; ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    <tr>
                                        <?php for ($i=7; $i<=9; $i++): ?>
                                            <?php for ($j=1; $j<=4; $j++): ?>
                                                <td class="progress_<?= isset($detail->monthly_progress[$i][$j]) ? $detail->monthly_progress[$i][$j] : ''; ?>"></td>
                                            <?php endfor; ?>
                                        <?php endfor; ?>
                                    </tr>

                                    <tr>
                                        <?php for ($i=10; $i<=12; $i++): ?>
                                            <th colspan="4"><?= AppConstants::$monthsList[$i]; ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                    <tr>
                                        <?php for ($i=10; $i<=12; $i++): ?>
                                            <?php for ($j=1; $j<=4; $j++): ?>
                                                <td class="progress_<?= isset($detail->monthly_progress[$i][$j]) ? $detail->monthly_progress[$i][$j] : ''; ?>"></td>
                                            <?php endfor; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">
                                <strong><?= $detail->workingPlanAttribute->attr_text; ?></strong>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <label><strong><?= AppLabels::LEGEND; ?></strong></label>
            <ul class="list list-unstyled working_plan">
                <?php foreach ($legends as $legend): ?>
                    <li><label class="progress_<?= $legend->cset_code; ?>"><?= sprintf('%s : %s', $legend->cset_code, $legend->cset_value); ?></label></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <?= ViewButton::widget(['model' => $model]); ?>
</div>
