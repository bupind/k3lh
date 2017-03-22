<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\DetailView;
use backend\models\PpaQuestion;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $questionGroups \backend\models\Codeset[] */

$no = 1;
$index = 0;

?>
<div class="ppa-technical-provision-view">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="row header smaller lighter blue">
                <span class="col-sm-7">
                    <i class="ace-icon fa fa-flask"></i>
                    <?= AppLabels::LABORATORIUM; ?>
                </span>
            </h3>
            
            <?php foreach ($model->technicalProvision->ppaLaboratoriums as $keyLabor => $ppaLaboratorium): ?>
            <div class="widget-box labor-widget">
                <div class="widget-body">
                    <div class="widget-main form-horizontal">
                        <?= DetailView::widget([
                            'model' => $ppaLaboratorium,
                            'options' => [
                                'excluded' => ['ppa_technical_provision_id'],
                                'bottom-space' => 'space-10'
                            ]
                        ]); ?>
                        
                        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                            <thead>
                            <tr>
                                <th><?= AppLabels::LABOR_ACCREDITATION_NUMBER_TITLE; ?></th>
                                <th><?= AppLabels::LABOR_ACCREDITATION_END_DATE_TITLE; ?></th>
                                <th><?= AppLabels::DESCRIPTION; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ppaLaboratorium->ppaLaboratoriumAccreditations as $keyAccr => $ppaLaboratoriumAccreditation): ?>
                                <tr>
                                    <td><?= $ppaLaboratoriumAccreditation->lacc_number; ?></td>
                                    <td><?= $ppaLaboratoriumAccreditation->lacc_end_date; ?></td>
                                    <td><?= $ppaLaboratoriumAccreditation->lacc_remark; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <hr/>

                        <fieldset>
                            <div class="field-ppalaboratorium-test_value">
                                <label><?= AppLabels::LABOR_TEST_MONTH; ?></label>
                                <div class="row">
                                    <?php
                                    foreach ($ppaLaboratorium->ppaLaboratoriumTests as $keyTest => $laboratoriumTest) {
                                        echo Html::beginTag('div', ['class' => 'checkbox col-xs-12 col-sm-4']);
                    
                                        echo Html::beginTag('label');
                                        echo Html::checkbox("PpaLaboratoriumTest[$keyLabor][$keyTest][test_value]", $laboratoriumTest->test_value == 1, ['class' => 'ace', 'disabled' => true]);
                                        echo Html::beginTag('span', ['class' => 'lbl']);
                                        echo ' ' . $startDate->format('M Y');
                                        echo Html::endTag('span');
                                        echo Html::endTag('label');
                                        echo Html::endTag('div');
                    
                                        $startDate->add(new \DateInterval('P1M'));
                                    }
                
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <hr />
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup): ?>
                <h4 class="header lighter green"><?= $qGroup->cset_value; ?></h4>
                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th><?= AppLabels::NUMBER_SHORT; ?>.</th>
                        <th><?= AppLabels::TECHNICAL_PROVISION; ?></th>
                        <th><?= AppLabels::DOCUMENTS; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (PpaQuestion::map(new PpaQuestion(), 'ppaq_question', null, true, [
                        'where' => [
                            ['ppaq_question_type_code' => $qGroup->cset_code]
                        ],
                        'empty' => false
                    ]) as $ppaqId => $question): ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $question; ?></td>
                            <td>
                                <?= Converter::attachments($model->technicalProvision->ppaTechnicalProvisionDetails[$index]->attachmentOwners, [
                                    'show_file_upload' => true,
                                    'show_delete_file' => true,
                                    'index' => $index
                                ]); ?>
                            </td>
                        </tr>
                        <?php $index++; endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>
