<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use yii\helpers\Url;
use backend\models\Sector;
use app\components\SubmitLinkButton;
use backend\assets\Smk3Asset;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3 */
/* @var $form yii\widgets\ActiveForm */
/* @var $allTitle backend\models\Smk3Title */
/* @var $powerPlantList [backend\models\PowerPlant] */

Smk3Asset::register($this);
$baseUrl = Url::base();
?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'smk3-form',
    'options' => [
        'class' => 'form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

?>

<div class="row smk3-form">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <?php

        echo $form->field($model, 'sector_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList(Sector::map(new Sector(), 'sector_name'), ['class' => 'sector-list ' . AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'power_plant_id', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->dropDownList($powerPlantList, ['id' => 'power-plant-list', 'class' => AppConstants::ACTIVE_FORM_CLASS_DROPDOWN])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'smk3_year', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT_NUMBERSONLY])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);

        echo $form->field($model, 'smk3_quarter', ['template' => AppConstants::ACTIVE_FORM_TEMPLATE_INPUT_COL_9_FULL])
            ->textInput(['maxlength' => true, 'class' => AppConstants::ACTIVE_FORM_CLASS_INPUT_TEXT])
            ->label(null, ['class' => AppConstants::ACTIVE_FORM_CLASS_LABEL_COL_3]);
        ?>
    </div>
</div>

<hr/>

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
                        <th rowspan="1" colspan="4" class="text-center"><?= AppLabels::SUITABILITY ?> </th>
                    </tr>
                    <tr>
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
                                <td colspan="2" class="text-center"><?= Html::hiddenInput($hiddenName, $criteria->id); ?><?= Html::radio($answerName, false, ['value' => '1', 'class' => 'radio-inline'])?></td>
                                <td colspan="2" class="text-center"><?= Html::radio($answerName, true, ['value' => '0', 'class' => 'radio-inline'])?></td>
                            <?php } else{ ?>
                                <?php foreach ($criteria->smk3Details as $key3 => $detail): ?>
                                    <?php if ($model->id == $detail->smk3_id) { ?>
                                        <td colspan="2" class="text-center"><?= Html::activeHiddenInput($detail, "[$key][$key1][$key2]smk3_criteria_id"); ?><?= Html::activeHiddenInput($detail, "[$key][$key1][$key2]id"); ?><?= Html::activeRadio($detail, "[$key][$key1][$key2]sdtl_answer", ['label' => '', 'value' => 1, 'uncheck' => null]); ?></td>
                                        <td colspan="2" class="text-center"><?= Html::activeRadio($detail, "[$key][$key1][$key2]sdtl_answer", ['label' => '', 'value' => 0, 'uncheck' => null]); ?></td>
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

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'smk3-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
