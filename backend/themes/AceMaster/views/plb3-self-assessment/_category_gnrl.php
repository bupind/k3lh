<?php

use backend\models\Plb3SaQuestion;
use common\components\helpers\Converter;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $codeset \backend\models\Codeset */
/* @var $index int */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */

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
            <td><?= $no++; ?>.</td>
            <td><?= $questionL1->label; ?></td>
            <td><?= Converter::attachments($plb3SaFormDetailModels[$questionL1->id]->attachmentOwners); ?></td>
        </tr>
        <?php $index++; endforeach; ?>
    </tbody>
</table>
