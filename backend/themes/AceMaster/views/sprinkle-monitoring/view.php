<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\SprinkleMonitoring */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->sm_year);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_SPRINKLE_MONITORING), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprinkle-monitoring-view">

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
                        'sm_form_month_type_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sm_form_month_type_code_desc],
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
                        <th rowspan="3" class="text-center"><?= "Head Sprinkle No." ?></th>
                        <th class="text-center" rowspan="3"><?= AppLabels::LOCATION ?></th>
                        <th class="text-center" colspan="3"><?= "Pengecekan Visual" ?></th>
                        <th rowspan="3" class="text-center"><?= "Catatan Hasil Pengecekan" ?></th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center"><?= "Head Sprinkle" ?></th>
                        <th rowspan="2" class="text-center"><?= "Fisik Detector" ?></th>
                        <th class="text-center" rowspan="2"><?= "Kondisi Piping" ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->sprinkleMonitoringDetails as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= ($key + 1) ?></td>
                            <td class="text-center"><?= $value->sm_location ?></td>
                            <td class="text-center"><?= $value->sm_sprinkle_head_desc ?></td>
                            <td class="text-center"><?= $value->sm_detector_desc ?></td>
                            <td class="text-center"><?= $value->sm_piping_condition_desc ?></td>
                            <td class="text-center"><?= $value->sm_notes ?></td>

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
