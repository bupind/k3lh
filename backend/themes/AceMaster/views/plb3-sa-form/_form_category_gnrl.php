<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use backend\models\Plb3SaQuestion;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $codeset \backend\models\Codeset */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $index int */

$no = 1;
?>

<h4 class="header lighter green"><?= $codeset->cset_value; ?></h4>
<table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
    <thead>
    <tr>
        <th><?= AppLabels::NUMBER_SHORT; ?>.</th>
        <th><?= AppLabels::IMPLEMENTATION_OF_B3_WASTE_MANAGEMENT; ?></th>
        <th><?= AppLabels::DOCUMENTS; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach (Plb3SaQuestion::find()
                       ->where(['category_code' => $codeset->cset_code])
                       ->andWhere(['parent_id' => null])
                       ->all() as $l1Key => $questionL1): ?>
        <tr>
            <td>
                <?= $no++; ?>.
                <?php
                if (!$plb3SaFormDetailModels[$questionL1->id]->isNewRecord) {
                    echo Html::activeHiddenInput($plb3SaFormDetailModels[$questionL1->id], "[$index]id");
                }
                ?>
            </td>
            <td>
                <?= $questionL1->label; ?>
                <?= $form->field($plb3SaFormDetailModels[$questionL1->id], "[$index]plb3_sa_question_id")->hiddenInput(['value' => $questionL1->id])->label(false)->error(false); ?>
            </td>
            <td>
                <?= Converter::attachments($plb3SaFormDetailModels[$questionL1->id]->attachmentOwners, [
                    'show_file_upload' => true,
                    'show_delete_file' => true,
                    'index' => $index
                ]); ?>
            </td>
        </tr>
        <?php $index++; endforeach; ?>
    </tbody>
</table>
