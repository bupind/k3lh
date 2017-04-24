<?php

use yii\helpers\Html;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\DetailView;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\Skko */
/* @var $sectorModel backend\models\Sector */
/* @var $detailModel backend\models\SkkoDetail[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_VIEW, AppLabels::DOCUMENTS, AppLabels::SKKO);
$this->params['subtitle'] = sprintf('%s', $model->sector->sector_name);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::DOCUMENTS, AppLabels::SKKO), 'url' => ['index', '_sId' => $sectorModel->id]];
$this->params['breadcrumbs'][] = $this->title;
$index = 1;
?>
<div class="skko-view">

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

    <div class="col-xs-4 col-xs-offset-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'excluded' => ['form_type_code', 'power_plant_id'],
                'converter' => [
                    'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                ]
            ]
        ]); ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="table-skko" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL ?>">
                <thead>
                <tr>
                    <th class="text-center" width="5%"><?= AppLabels::NUMBER_SHORT ?></th>
                    <th class="text-center" width="40%"><?= AppLabels::SKKO_NUMBER ?></th>
                    <th class="text-center" width="20%"><?= AppLabels::DATE ?></th>
                    <th class="text-center"><?= AppLabels::DOCUMENTS ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($detailModel as $keyD => $skkoDetail) : ?>
                    <tr>
                        <td class="text-center"> <?= $index ?></td>
                        <td class="text-center">
                            <?= $skkoDetail->skko_number ?>
                        </td>
                        <td class="text-center">
                            <?= $skkoDetail->skko_date ?>
                        </td>
                        <td class="text-center">
                            <?= Converter::attachment($skkoDetail->attachmentOwner, ['show_file_upload' => true, 'show_delete_file' => true, 'index' => $keyD]); ?>
                        </td>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>
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
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_sId' => $sectorModel->id],  ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_sId' => $sectorModel->id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_sId' => $sectorModel->id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
