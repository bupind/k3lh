<?php

use yii\helpers\Html;
use app\components\ViewButton;
use yii\widgets\DetailView;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppa */
/* @var $startDate DateTime */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::POLLUTION_LOAD_ACTUAL);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $model->getSummary()), 'url' => ['/ppa/update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::POLLUTION_LOAD_ACTUAL, 'url' => ['pollution-load-actual', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

$dataSet = $model->getPollutionLoadActualDataSet();
?>
<div class="ppa-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                </small>
            <?php endif; ?>
        </h1>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?> calx">
                    <thead>
                    <tr>
                        <th colspan="3" rowspan="2">&nbsp;</th>
                        <th colspan="12" class="text-center"><?= AppLabels::POLLUTION_LOAD_ACTUAL_CALC_RESULT_TITLE; ?></th>
                        <th rowspan="2"><?= AppLabels::DEBIT_UNIT; ?></th>
                        <th rowspan="2"><?= AppLabels::PRODUCTION_UNIT; ?></th>
                        <th rowspan="2" class="text-right"><?= AppLabels::POLLUTION_LOAD_TOTAL_GRAM; ?></th>
                        <th rowspan="2" class="text-right"><?= AppLabels::POLLUTION_LOAD_TOTAL_KG; ?></th>
                        <th rowspan="2" class="text-right"><?= AppLabels::POLLUTION_LOAD_TOTAL_TON; ?></th>
                    </tr>
                    <tr>
                        <?php for ($i=0; $i<12; $i++): ?>
                            <th class="text-right"><?= $startDate->format('M Y'); ?></th>
                        <?php $startDate->add(new \DateInterval('P1M')); endfor; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataSet as $key => $data): ?>
                        <tr>
                            <td><?= $data[0]; ?></td>
                            <td><?= $data[1]; ?></td>
                            <td><?= $data[2]; ?></td>
    
                            <?php for ($i=3; $i<15; $i++): ?>
                                <td class="text-right" data-format="0,0[.]000000000"><?= isset($data[$i]) ? $data[$i] : ''; ?></td>
                            <?php endfor; ?>

                            <td><?= $data[15]; ?></td>
                            <td><?= $data[16]; ?></td>
                            <td class="text-right" data-format="0,0[.]000000000"><?= $data[17]; ?></td>
                            <td class="text-right" data-format="0,0[.]000000000"><?= $data[18]; ?></td>
                            <td class="text-right" data-format="0,0[.]000000000"><?= $data[19]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => '',
                        'edit' => '',
                        'delete' => '',
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['update', 'id' => $model->id], ['class' => 'btn btn-white btn-danger btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
