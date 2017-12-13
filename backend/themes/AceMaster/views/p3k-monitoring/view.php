<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\P3kMonitoring */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->pm_location);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_K3_SUPERVISION), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p3k-monitoring-view">

    <div class="page-header">
        <h1>
            <?= Html::encode(sprintf("%s", $this->title)) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'converter' => [
                        'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name],
                        'power_plant_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->powerPlant->pp_name],
                    ],
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="table-k3-supervision-view" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center"><?= AppLabels::NUMBER_SHORT ?></th>
                        <th rowspan="2" class="text-center"><?= "Isi Kotak P3K" ?></th>
                        <th rowspan="2" class="text-center"><?= "Jumlah Standar" ?></th>
                        <th colspan="12" class="text-center"><?= "Jumlah Isi Kotak P3K" ?></th>
                        <th rowspan="2" class="text-center"><?= AppLabels::DESCRIPTION ?></th>
                    </tr>
                    <tr>
                        <?php foreach(AppConstants::$monthsList as $key => $value) : ?>
                            <td class="text-center"><?= $value ?> </td>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->p3kMonitoringDetails as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= ($key + 1) ?></td>
                            <td class="text-center"><?= $value->pmd_value ?></td>
                            <td class="text-center"><?= $value->pmd_standard_amount ?></td>
                            <?php foreach ($value->pmdMonths as $key1 => $value1) : ?>
                                <td class="text-center"><?= $value1->pmdm_value ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?= ViewButton::widget([
                'model' => $model,
                'options' => [
                    'template' => AppConstants::VIEW_BUTTON_TEMPLATE_EXCEL,
                    'buttons' => [
                        'excel' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_EXPORT, ['export', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-purple btn-bold']),
                        'create' => Html::a('<i class="ace-icon fa fa-plus bigger-120"></i> ' . AppLabels::BTN_ADD, ['create', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-success btn-bold']),
                        'index' => Html::a('<i class="ace-icon fa fa-undo bigger-120 red2"></i> ' . AppLabels::BTN_BACK, ['index', '_ppId' => $model->power_plant_id], ['class' => 'btn btn-white btn-danger btn-bold']),
                        'edit' => Html::a('<i class="ace-icon fa fa-pencil bigger-120"></i> ' . AppLabels::BTN_UPDATE, ['update', '_ppId' => $model->power_plant_id, 'id' => $model->id], ['class' => 'btn btn-white btn-info btn-bold']),
                    ]
                ]
            ]); ?>
        </div>
    </div>

</div>
