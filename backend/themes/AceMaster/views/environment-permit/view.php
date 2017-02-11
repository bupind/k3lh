<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\DetailView;
use app\components\ViewButton;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::ENVIRONMENT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ENVIRONMENT_PERMIT, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'excluded' => ['form_type_code'],
            'converter' => [
                'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
            ]
        ]
    ]); ?>

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
                <?php foreach ($model->environmentPermitDetails as $key => $detail): $key+=1; ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td class="text-center"><?= Html::label($detail->ep_document_name, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($detail->ep_institution, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($detail->ep_date, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($detail->ep_limit_capacity, null, [ 'class' => 'control-label']); ?></td>
                        <td class="text-center"><?= Html::label($detail->ep_realization_capacity, null, [ 'class' => 'control-label']); ?></td>
                        <td><span class="col-sm-6"><?= Converter::attachment($detail->attachmentOwner); ?></span></td>
                    </tr>
                <?php  endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>

    <?= ViewButton::widget(['model' => $model]); ?>

</div>
