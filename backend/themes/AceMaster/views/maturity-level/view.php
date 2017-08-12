<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevel */
/* @var $detailModels \backend\models\MaturityLevelDetail[] */
/* @var $maturityLevelTitles \backend\models\MaturityLevelTitle[] */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::MATURITY_LEVEL);
$this->params['subtitle'] = sprintf('%s %s %s %s', AppLabels::QUARTER, $model->mlvl_quarter, AppLabels::YEAR, $model->mlvl_year);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MATURITY_LEVEL, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$index = 0;
$no = 1;
?>
<div class="maturity-level-view">

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
            'converter' => [
                'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
            ]
        ]
    ]); ?>

    <hr/>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-action" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?> calx">
                <thead>
                <tr>
                    <th><?= AppLabels::NO; ?></th>
                    <th><?= AppLabels::ACTION_PLAN; ?></th>
                    <th><?= AppLabels::CRITERIA; ?></th>
                    <th><?= AppLabels::UNIT; ?></th>
                    <th><?= AppLabels::TARGET; ?></th>
                    <th><?= AppLabels::REALIZATION; ?></th>
                    <th><?= AppLabels::WEIGHT; ?></th>
                    <th><?= AppLabels::VALUE; ?></th>
                    <th><?= AppLabels::DOCUMENTS; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($maturityLevelTitles as $keyTitle => $title): ?>
                    <tr>
                        <td><strong><?= Converter::toRoman(++$keyTitle); ?>.</strong></td>
                        <td colspan="8"><strong><?= $title->title_text; ?></strong></td>
                    </tr>
                    <?php foreach ($title->maturityLevelQuestions as $keyQuestion => $question): ?>
                        <?php if (isset($detailModels[$index])): ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $question->q_action_plan; ?></td>
                            <td><?= $question->q_criteria; ?></td>
                            <td><?= $question->q_unit_code_desc; ?></td>
                            <td>
                                <span data-cell="A<?= $index; ?>" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $detailModels[$index]->mld_target; ?></span>
                            </td>
                            <td>
                                <span data-cell="B<?= $index; ?>" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $detailModels[$index]->mld_realization; ?></span>
                            </td>
                            <td>
                                <span data-cell="C<?= $index; ?>" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>"><?= $question->q_weight; ?></span>
                            </td>
                            <td>
                                <span data-cell="D<?= $index; ?>" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>" data-formula="(B<?= $index; ?>/A<?= $index; ?>)*C<?= $index; ?>"></span>
                            </td>
                            <td><?= Converter::attachment($detailModels[$index]->attachmentOwner); ?></td>
                        </tr>
                    <?php $index++; endif; endforeach; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="6" class="text-center"><strong><?= AppLabels::TOTAL_MATURITY; ?></strong></th>
                    <th><strong><span data-cell="E1" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>" data-formula="SUM(C0:C<?= $index; ?>)"></span></strong></th>
                    <th><strong><span data-cell="F1" data-format="<?= AppConstants::CALX_DATA_FORMAT_THO_DEC; ?>" data-formula="SUM(D0:D<?= $index; ?>)"></span></strong></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <?= ViewButton::widget([
        'model' => $model,
        'options' => [
            'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL
        ]
    ]); ?>

</div>
