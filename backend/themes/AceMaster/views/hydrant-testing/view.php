<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use app\components\ViewButton;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantTesting */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ht_year);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_HYDRANT_TESTING), 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hydrant-testing-view">

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
                <table id="table-hydrant-testing-view" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nomor Hydrant</th>
                        <th rowspan="2"><?= AppLabels::LOCATION ?></th>
                        <th rowspan="2">Pompa</th>
                        <?php foreach (AppConstants::$monthsList as $key => $month) : ?>
                            <th class="text-center" rowspan="1" colspan="5"><?= $month ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                        <th colspan="1" class="text-center"><?= AppLabels::DATE ?></th>
                        <th colspan="1" class="text-center"><?= "Pressure (bar)" ?></th>
                        <th colspan="1" class="text-center"><?= "Flow Rate" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Vertikal (m)" ?></th>
                        <th colspan="1" class="text-center"><?= "J. Horizontal (m)" ?></th>

                    </tr>

                    </thead>
                    <tbody>
                        <?php foreach($model->hydrantTestingDetails as $key => $value) : ?>
                            <tr>
                                <td rowspan="2" class="text-center"><?= ($key+1) ?></td>
                                <td rowspan="2" class="text-center"><?= $value->htd_number ?></td>
                                <td rowspan="2" class="text-center"><?= $value->htd_location ?></td>
                                <td class="text-center">Electrical Pump</td>
                                <?php foreach($value->htdMonthsElectrical as $key1 => $value1) : ?>
                                    <td class="text-center"><?= $value1->htdm_date ?></td>
                                    <td class="text-center"><?= $value1->htdm_pressure ?></td>
                                    <td class="text-center"><?= $value1->htdm_flow_rate ?></td>
                                    <td class="text-center"><?= $value1->htdm_vertical ?></td>
                                    <td class="text-center"><?= $value1->htdm_horizontal ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td class="text-center">Diesel Pump</td>
                                <?php foreach($value->htdMonthsDiesel as $key1 => $value1) : ?>
                                    <td class="text-center"><?= $value1->htdm_date ?></td>
                                    <td class="text-center"><?= $value1->htdm_pressure ?></td>
                                    <td class="text-center"><?= $value1->htdm_flow_rate ?></td>
                                    <td class="text-center"><?= $value1->htdm_vertical ?></td>
                                    <td class="text-center"><?= $value1->htdm_horizontal ?></td>
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
