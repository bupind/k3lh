<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3 */

$this->title = sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::DATA_FORM,AppLabels::SMK3);
$this->params['breadcrumbs'][] = ['label' => sprintf("%s %s", AppLabels::DATA_FORM,AppLabels::SMK3), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$countYes = 0;
$countNo = 0;
?>
<div class="smk3-view">

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

    <div class="col-xs-6 col-xs-offset-3">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'converter' => [
                    'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                    'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                ]
            ]
        ]); ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($allTitle as $key => $title):  ?>
                <h1> <?= $key+1 ?>. <?= $title->sttl_title ?> </h1>
                <?php foreach ($title->smk3Subtitles as $key1 => $subtitle):  ?>
                    <h2><?= $key+1 ?>.<?= $key1+1 ?> <?= $subtitle->ssub_subtitle ?></h2>
                    <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                        <thead>
                        <tr>
                            <th rowspan="2" width="3%"><?= AppLabels::NUMBER ?> </th>
                            <th rowspan="2" width="7%" class="text-center"><?= AppLabels::ELEMENT ?> </th>
                            <th rowspan="2" width="80%" class="text-center"><?= AppLabels::CRITERIA ?> </th>
                            <th rowspan="1" colspan="6" class="text-center"><?= AppLabels::SUITABILITY ?> </th>
                        </tr>
                        <tr>
                            <th rowspan="1" colspan="2" class="text-center"><?= AppLabels::IGNORED ?></th>
                            <th rowspan="1" colspan="2" class="text-center"><?= AppLabels::SUITABLE ?></th>
                            <th rowspan="1" colspan="2" class="text-center"><?= AppLabels::NO ?></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($subtitle->smk3Criterias as $key2 => $criteria):  ?>
                            <tr>
                                <td class="text-center"><?= $key2+1 ?></td>
                                <td class="text-center"><?= $key+1 ?>.<?= $key1+1 ?>.<?= $key2+1 ?></td>
                                <td><?= $criteria->sctr_criteria?></td>
                                <?php $answerName = "Smk3Detail[" . ($key+1) . "][" . ($key1+1) . "][" . ($key2+1) . "][sdtl_answer]"; ?>
                                <?php $hiddenName = "Smk3Detail[" . ($key+1) . "][" . ($key1+1) . "][" . ($key2+1) . "][smk3_criteria_id]"; ?>
                                <?php if($model->getIsNewRecord()){ ?>
                                    <td colspan="2" class="text-center">
                                        <?= Html::hiddenInput($hiddenName, $criteria->id); ?>
                                        <?= Html::radio($answerName, false, ['value' => '1', 'class' => 'radio-inline'])?>
                                    </td>
                                    <td colspan="2" class="text-center">
                                        <?= Html::radio($answerName, true, ['value' => '0', 'class' => 'radio-inline'])?>
                                    </td>
                                <?php } else{ ?>
                                    <?php foreach ($criteria->smk3Details as $key3 => $detail): ?>
                                        <?php if ($model->id == $detail->smk3_id) { ?>
                                            <td colspan="2" class="text-center">
                                                <?php if($detail->sdtl_answer == "0"){?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?>
                                            </td>
                                            <td colspan="2" class="text-center">
                                                <?php if($detail->sdtl_answer == "1"){ $countYes++;?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?>
                                            </td>
                                            <td colspan="2" class="text-center">
                                                <?php if($detail->sdtl_answer == "2"){  $countNo++;?> <i class="ace-icon fa fa-check bigger-120"></i> <?php } ?>
                                            </td>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>

                    </table>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-xs-12">
        <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
            <thead>
            <tr>
                <th colspan="2"><?= AppLabels::AUDIT_RESULT ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::CRITERIA); ?></td>
                <td><?= $countYes+$countNo ?></td>
            </tr>
            <tr>
                <td><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::SUITABLE); ?></td>
                <td><?= $countYes ?></td>
            </tr>
            <tr>
                <td><?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::NO); ?></td>
                <td><?= $countNo ?></td>
            </tr>
            <tr>
                <td><?= AppLabels::EFFICIENCY ?></td>
                <td><?= sprintf("%s%%", $countYes/($countYes+$countNo)*100); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <?= ViewButton::widget(['model' => $model]); ?>
</div>
