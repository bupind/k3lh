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
Smk3Asset::register($this);
$baseUrl = Url::base();
?>

<?php
echo Html::hiddenInput('baseUrl', $baseUrl, ['id' => 'baseUrl']);
$form = ActiveForm::begin([
    'id' => 'budget-monitoring-form',
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

<div class="row budget-monitoring-LH-form">
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
        ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-12">
        <table id="table-smk3" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">

        <thead>
        <tr>
            <th>
                <?php
                foreach ($allTitle->Smk3Subtitle as $key => $subtitle):  ?>
            <?= $subtitle ?>

                <?php endforeach; ?>
            </th>

        </tr>
        </thead>

        <tbody>

        </tbody>

        <tfoot>

        </tfoot>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 form-actions text-center">
        <?= SubmitLinkButton::widget(['formId' => 'budget-monitoring-form', 'backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
