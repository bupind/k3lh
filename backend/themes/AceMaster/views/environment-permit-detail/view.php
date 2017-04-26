<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use app\components\ViewButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitDetail */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::DOCUMENT_VALIDATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::DOCUMENT_VALIDATION, 'url' => ['index', 'epId' => $model->environment_permit_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'environment-permit-form',
    'options' => [
        'class' => 'calx form-horizontal',
        'role' => 'form',
        'enctype' => 'multipart/form-data'
    ],
    'fieldConfig' => [
        'options' => [
            'tag' => 'div'
        ]
    ]
]);
?>

<div class="environment-permit-view">

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

    <div class="row">
        <div class="col-xs-12">
            <table id="table-environment-permit" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">

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
                    <tr>
                        <td>1</td>
                        <td class="text-center"><?= Html::label($model->ep_document_name, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($model->ep_institution, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($model->ep_date, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($model->ep_limit_capacity, null, [ 'data-cell' => "A1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($model->ep_realization_capacity, null, [ 'data-cell' => "B1", 'data-format' => AppConstants::CALX_DATA_FORMAT_THO, 'class' => 'control-label']); ?></td>
                        <td><span class="col-sm-6"><?= Converter::attachment($model->attachmentOwner); ?></span></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'buttons' => [
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', 'epId' => $model->environment_permit_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', 'epId' => $model->environment_permit_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', 'epId' => $model->environment_permit_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
