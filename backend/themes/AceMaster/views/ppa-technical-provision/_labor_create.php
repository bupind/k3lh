<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $startDate DateTime */
?>

<fieldset>
    <div class="field-ppalaboratorium-labor_name">
        <label><?= AppLabels::NAME; ?></label>
        <?= Html::textInput('PpaLaboratorium[0][labor_name]', null, ['class' => 'form-control']); ?>
    </div>
</fieldset>

<div class="space-8"></div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-6 text-right">
        <button class="btn btn-minier btn-primary btn-add-accreditation" data-labor-index="0"><?= AppLabels::BTN_ADD; ?></button>
    </div>
</div>
<div class="space-2"></div>

<table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
    <thead>
    <tr>
        <th><?= AppLabels::LABOR_ACCREDITATION_NUMBER_TITLE; ?></th>
        <th><?= AppLabels::LABOR_ACCREDITATION_END_DATE_TITLE; ?></th>
        <th><?= AppLabels::DESCRIPTION; ?></th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<hr/>

<fieldset>
    <div class="field-ppalaboratorium-test_value">
        <label><?= AppLabels::LABOR_TEST_MONTH; ?></label>
        <div class="row">
            <?php
            for ($i=0; $i<12; $i++) {
                echo Html::beginTag('div', ['class' => 'checkbox col-xs-12 col-sm-4']);
                
                echo Html::hiddenInput("PpaLaboratoriumTest[0][$i][test_month]", $startDate->format('m'));
                echo Html::hiddenInput("PpaLaboratoriumTest[0][$i][test_year]", $startDate->format('Y'));
                
                echo Html::beginTag('label');
                echo Html::checkbox("PpaLaboratoriumTest[0][$i][test_value]", false, ['class' => 'ace']);
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
