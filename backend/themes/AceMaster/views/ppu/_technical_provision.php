<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $ppuQuestions backend\models\PpuQuestion[] */

?>

<div class="ppu-bm-report-parameter-view">
    <div class="page-header">
        <h1><?= Html::encode(sprintf("%s %s", AppLabels::BTN_VIEW, AppLabels::TECHNICAL_PROVISION)) ?></h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th><?= AppLabels::NUMBER_SHORT ?></th>
                        <th><?= AppLabels::TECHNICAL_PROVISION ?></th>
                        <th><?= AppLabels::SUPPORTING_EVIDENCE ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($model->ppuTechnicalProvisions as $keyTP => $ppuTechnicalProvision) : ?>
                        <?php foreach($ppuTechnicalProvision->ppuTechnicalProvisionDetails as $keyTPD => $ppuTechnicalProvisionDetail) : $keyQ = $keyTPD + 1; ?>
                            <tr>
                                <td>
                                    <?= $keyQ ?>
                                </td>
                                <td>
                                    <?= $ppuQuestions[$keyTPD]->ppuq_question ?>
                                </td>
                                <td>
                                    <?= Converter::attachment($ppuTechnicalProvisionDetail->attachmentOwner, []); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>