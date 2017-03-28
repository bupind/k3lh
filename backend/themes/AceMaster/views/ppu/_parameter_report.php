<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model \backend\models\Ppu */
/* @var $startDate DateTime */

?>

<div class="page-header">
    <h1><?= Html::encode(sprintf("%s %s %s", AppLabels::BTN_VIEW, AppLabels::REPORT, AppLabels::PARAMETER)) ?></h1>
</div>

<div class="row">
    <div class="col-xs-12">
        <div id="accordion" class="accordion-style1 panel-group">
            <?php foreach($model->ppuEmissionSources as $keyES => $emissionSource): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $keyES ?>">
                                <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down"
                                   data-icon-show="ace-icon fa fa-angle-right"></i>
                                <?= $emissionSource->ppues_name ?>
                            </a>
                        </h4>
                    </div>


                    <div class="panel-collapse collapse <?php echo $temp= $keyES==0 ? "in" : "" ?>" id="collapse<?= $keyES ?>">
                        <div class="panel-body">
                            <?php foreach($emissionSource->ppucemsReportBms as $keyRB => $ppucemsReportBm) : ?>
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="col-xs-6">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE)?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_name?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s %s", AppLabels::TYPE, AppLabels::EMISSION_SOURCE)?></div>
                                            <div class="profile-info-value"><?= $ppucemsReportBm->ppucemsrb_parameter_code_desc?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s/%s %s", AppLabels::NAME, AppLabels::CODE, AppLabels::CHIMNEY)?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_chimney_name?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s %s (%s)", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::DIAMETER)?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_chimney_diameter?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s %s (%s)", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::LENGTH)?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_hole_position?> </div>
                                        </div>

                                    </div>
                                    <div class="col-xs-6">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s %s (%s)", AppLabels::DIMENSION, AppLabels::CHIMNEY, AppLabels::HEIGHT);?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_chimney_height?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= AppLabels::FUEL ?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_fuel_name_code_desc?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= AppLabels::CAPACITY ?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_capacity?> </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name info-large"><?= sprintf("%s (%s)", AppLabels::OPERATION_TIME, AppLabels::HOUR)?></div>
                                            <div class="profile-info-value"><?= $emissionSource->ppues_operation_time?> </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <div class="table-responsive">
                                    <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> <?= AppLabels::NUMBER_SHORT ?> </th>
                                                <th class="text-center"> <?= AppLabels::QUARTER ?> </th>
                                                <th class="text-center"> <?= AppLabels::MEASUREMENT_TIME ?> </th>
                                                <th class="text-center"> <?= sprintf("%s %s (%s)",AppLabels::AVERAGE_CONCENTRATION, AppLabels::DAILY, AppLabels::MGNM3_UNIT); ?> </th>
                                                <th class="text-center"> <?= sprintf("%s (%s)", AppLabels::BARISTAND_CALC_RESULT, AppLabels::MGNM3_UNIT); ?> </th>
                                                <th class="text-center"> <?= sprintf("%s %s %s (%s)", AppLabels::OPERATIONAL_TIME, AppLabels::CEMS, AppLabels::DAILY, AppLabels::HOUR); ?> </th>
                                                <th class="text-center"> <?= AppLabels::QUALITY_STANDARD ?> </th>
                                                <th class="text-center"> <?= AppLabels::QUALITY_STANDARD_UNIT ?> </th>
                                                <th class="text-center"> <?= AppLabels::QUALITY_STANDARD_REF ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($emissionSource->ppucemsrbParameterReports as $keyPR => $ppucemsrbParameterReport) : ?>
                                                <?php if($ppucemsrbParameterReport->ppucems_report_bm_id == $ppucemsReportBm->id) { ?>
                                                    <tr>
                                                        <th class="text-right"> <?= $keyPR + 1 ?> </th>
                                                        <th class="text-center"><?= $ppucemsrbParameterReport->ppucemsrbpr_quarter ?></th>
                                                        <th class="text-center"><?= $ppucemsrbParameterReport->ppucemsrbpr_calc_date ?></th>
                                                        <th class="text-right"> <?= $ppucemsrbParameterReport->ppucemsrbpr_avg_concentration ?></th>
                                                        <th class="text-right"> <?= $ppucemsrbParameterReport->ppucemsrbpr_calc_result ?></th>
                                                        <th class="text-right"> <?= $ppucemsrbParameterReport->ppucemsrbpr_operation_time ?></th>
                                                        <th class="text-right"> <?= $ppucemsrbParameterReport->ppucemsrbpr_qs ?> </th>
                                                        <th class="text-center"> <?= $ppucemsrbParameterReport->ppucemsrbpr_qs_unit_code_desc ?></th>
                                                        <th class="text-center"> <?= $ppucemsrbParameterReport->ppucemsrbpr_ref ?> </th>
                                                    </tr>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <br/>
                                <br/>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->