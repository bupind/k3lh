<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */
/* @var $form yii\widgets\ActiveForm */
/* @var $startDate DateTime */
/* @var $finalResult */

?>

<?php
$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::EMISSION_LOAD_CALCULATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::BTN_UPDATE, 'url' => ['/ppu/update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ppu-emission-load-calc">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

</div>

<?php
$form = ActiveForm::begin([
    'id' => 'ppu-emission-load-calc',
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

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table id="table-pollution-load" class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                <thead>
                    <tr>
                        <th rowspan="3" class="text-center"> <?= AppLabels::NUMBER_SHORT ?> </th>
                        <th rowspan="3" class="text-center"> <?= sprintf("%s %s", AppLabels::NAME, AppLabels::EMISSION_SOURCE); ?> </th>
                        <th rowspan="3" class="text-center"> <?= sprintf("%s %s", AppLabels::CODE, AppLabels::CHIMNEY) ?> </th>
                        <th rowspan="3" class="text-center"> <?= sprintf("%s", AppLabels::SECTION_AREA) ?> </th>
                        <th rowspan="3" class="text-center"> <?= sprintf("%s", AppLabels::MONITORED_PARAMETER) ?> </th>
                        <th rowspan="1" colspan="12" class="text-center"> <?= sprintf("%s", AppLabels::EMISSION_LOAD_CALCULATION_RESULT) ?> </th>
                        <th rowspan="3" class="text-center"> <?= sprintf("%s %s", AppLabels::AMOUNT, AppLabels::EMISSION_LOAD) ?> </th>
                    </tr>
                    <tr>
                        <?php
                            for($i=3; $i<=4; $i++){
                        ?>
                            <th rowspan="1" colspan="3" class="text-center">TW <?=$i?> <?= $startDate->format('Y') ?></th>
                        <?php }  $startDate->add(new \DateInterval('P1Y')); ?>

                        <?php
                        for($i=1; $i<=2; $i++){
                            ?>
                            <th rowspan="1" colspan="3" class="text-center">TW <?=$i?> <?= $startDate->format('Y') ?></th>
                        <?php } $startDate->setDate($model->ppu_year - 1, 7, 1); ?>
                    </tr>
                    <tr>
                        <?php
                            for($i=0; $i<12; $i++){
                        ?>
                            <th rowspan="1" colspan="1" class="text-center"><?= $startDate->format('M-y') ?></th>
                        <?php $startDate->add(new \DateInterval('P1M')); } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($finalResult as $key1 => $row){ ?>
                        <tr>
                            <?php foreach ($row as $key2 => $field) { ?>
                                <td> <?= $field ?> </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
