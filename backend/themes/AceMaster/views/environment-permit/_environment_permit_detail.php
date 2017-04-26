<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use common\components\helpers\Converter;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model \backend\models\EnvironmentPermit */
$index = 1;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'plb3-balance-sheet-detail-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);

?>
<div class="environment-permit-detail-view">
    <div class="row">
        <div class="table-responsive">
            <div class="col-xs-12">
                <table id="table-environment-permit-detail" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">

                    <thead>
                    <tr>
                        <th><?= AppLabels::NUMBER_SHORT ?></th>
                        <th><?= sprintf("%s %s %s", AppLabels::NAME, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                        <th><?= sprintf("%s %s %s", AppLabels::INSTITUTION, AppLabels::VERIFICATION, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                        <th><?= sprintf("%s %s %s %s", AppLabels::DATE, AppLabels::VERIFICATION, AppLabels::DOCUMENTS, AppLabels::ENVIRONMENT_PERMIT) ?></th>
                        <th><?= sprintf("%s %s", AppLabels::CAPACITY_LIMIT, AppLabels::PRODUCTION) ?></th>
                        <th><?= sprintf("%s %s", AppLabels::CAPACITY_REALIZATION, AppLabels::PRODUCTION) ?></th>
                        <th>Dampak penting yang dikelola</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($model->environmentPermitDetails as $key => $detail) : ?>
                        <tr>
                            <td><?= $index++ ?></td>
                            <td class="text-center"><?= Html::label($detail->ep_document_name, null, ['class' => 'control-label']); ?></td>
                            <td class="text-center"><?= Html::label($detail->ep_institution, null, ['class' => 'control-label']); ?></td>
                            <td class="text-center"><?= Html::label($detail->ep_date, null, ['class' => 'control-label']); ?></td>
                            <td class="text-center"><?= Html::label($detail->ep_limit_capacity, null, ['data-cell' => "A1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'control-label']); ?></td>
                            <td class="text-center"><?= Html::label($detail->ep_realization_capacity, null, ['data-cell' => "B1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'control-label']); ?></td>
                            <td><span class="col-sm-6"><?= Converter::attachment($detail->attachmentOwner); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

