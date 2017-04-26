<?php
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
    'id' => 'plb3-balance-sheet-report-form',
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

    <div class="environment-permit-report-view">
        <div class="row">
            <div class="table-responsive">
            <div class="col-xs-12">
                <table id="table-environment-permit-report" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">

                    <thead>
                    <tr>
                        <th width="10%"></th>
                        <?php foreach($model->environmentPermitReports as $key => $report) : ?>
                            <th class="text-center"> <?= $report->ep_quarter ?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="text-center"><?= AppLabels::DISTRICT ?></td>
                        <?php foreach ($model->environmentPermitReports as $key => $report) : ?>
                            <?php foreach($report->environmentPermitDistricts as $keyD => $district) : ?>
                            <td class="text-center">
                                <?= Converter::attachmentExtLink($district->ep_district, $district->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                            </td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td class="text-center"><?= AppLabels::PROVINCE ?></td>
                        <?php foreach ($model->environmentPermitReports as $key => $report) : ?>
                            <?php foreach($report->environmentPermitProvinces as $keyP => $province) : ?>
                                <td class="text-center">
                                    <?= Converter::attachmentExtLink($province->ep_province, $province->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                                </td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td class="text-center"><?= AppLabels::ENVIRONMENT_MINISTRY ?></td>
                        <?php foreach ($model->environmentPermitReports as $key => $report) : ?>
                            <?php foreach($report->environmentPermitMinistrys as $keyM => $ministry) : ?>
                                <td class="text-center">
                                    <?= Converter::attachmentExtLink($ministry->ep_ministry, $ministry->attachmentOwner, ['show_file_upload' => false, 'show_delete_file' => false]); ?>
                                </td>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tr>

                    </tbody>

                </table>
            </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>