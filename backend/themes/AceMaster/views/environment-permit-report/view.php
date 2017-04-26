<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use app\components\ViewButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitReport */
/* @var $districtModel backend\models\EnvironmentPermitDistrict[] */
/* @var $provinceModel backend\models\EnvironmentPermitProvince[] */
/* @var $ministryModel backend\models\EnvironmentPermitMinistry[] */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::REPORTING);
$this->params['breadcrumbs'][] = ['label' => AppLabels::REPORTING, 'url' => ['index', 'epId' => $model->environment_permit_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'environment-permit-report-form',
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
                    <th class="text-center"><?= AppLabels::NUMBER_SHORT ?></th>
                    <th class="text-center"><?= AppLabels::QUARTER ?></th>
                    <th class="text-center"><?= AppLabels::DISTRICT?></th>
                    <th class="text-center"><?= AppLabels::PROVINCE?></th>
                    <th class="text-center"><?= AppLabels::ENVIRONMENT_MINISTRY ?></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td class="text-center"><?= Html::label($model->ep_quarter, null, [ 'class' => 'control-label']); ?></td>
                    <?php foreach($districtModel as $keyD => $district) : ?>
                        <td class="text-center">
                            <?= Converter::attachmentExtLink($district->ep_district, $district->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                        </td>
                    <?php endforeach; ?>
                    <?php foreach($provinceModel as $keyD => $province) : ?>
                        <td class="text-center">
                            <?= Converter::attachmentExtLink($province->ep_province, $province->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                        </td>
                    <?php endforeach; ?>
                    <?php foreach($ministryModel as $keyD => $ministry) : ?>
                        <td class="text-center">
                            <?= Converter::attachmentExtLink($ministry->ep_ministry, $ministry->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                        </td>
                    <?php endforeach; ?>
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
