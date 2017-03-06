<?php

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use kartik\widgets\DatePicker;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $startDate DateTime */
/* @var $ppaLaboratoriumModels \backend\models\PpaLaboratorium[] */
?>

<?php foreach ($ppaLaboratoriumModels as $key => $laboratoriumModel): ?>
    <div class="widget-box labor-widget">
        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button class="btn btn-minier btn-danger btn-delete-laboratorium" data-id="<?= $laboratoriumModel->id; ?>"><?= sprintf('%s %s', AppLabels::BTN_DELETE, AppLabels::LABORATORIUM); ?></button>
                    </div>
                </div>
                
                <fieldset>
                    <div class="field-ppalaboratorium-labor_name">
                        <label><?= AppLabels::NAME; ?></label>
                        <?= Html::activeHiddenInput($laboratoriumModel, "[$key]id"); ?>
                        <?= Html::activeTextInput($laboratoriumModel, "[$key]labor_name", ['class' => 'form-control']); ?>
                    </div>
                </fieldset>

                <div class="space-8"></div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6 text-right">
                        <button class="btn btn-minier btn-primary btn-add-accreditation" data-labor-index="<?= $key; ?>"><?= AppLabels::BTN_ADD; ?></button>
                    </div>
                </div>
                <div class="space-2"></div>

                <table class="<?= AppConstants::TABLE_CLASS_DEFAULT_SMALL; ?>">
                    <thead>
                    <tr>
                        <th><?= AppLabels::LABOR_ACCREDITATION_NUMBER_TITLE; ?></th>
                        <th><?= AppLabels::LABOR_ACCREDITATION_END_DATE_TITLE; ?></th>
                        <th><?= AppLabels::DESCRIPTION; ?></th>
                        <th><?= AppLabels::ACTION; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($laboratoriumModel->ppaLaboratoriumAccreditations as $keyAccr => $laboratoriumAccreditation): ?>
                        <tr>
                            <td>
                                <?= Html::activeHiddenInput($laboratoriumAccreditation, "[$key][$keyAccr]id"); ?>
                                <?= Html::activeTextInput($laboratoriumAccreditation, "[$key][$keyAccr]lacc_number", ['class' => 'form-control']); ?>
                            </td>
                            <td>
                                <?= DatePicker::widget([
                                    'model' => $laboratoriumAccreditation,
                                    'attribute' => "[$key][$keyAccr]lacc_end_date",
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => AppLabels::DATE],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd-mm-yyyy',
                                        'todayHighlight' => 'true'
                                    ],
                                ])
                                ?>
                            </td>
                            <td><?= Html::activeTextInput($laboratoriumAccreditation, "[$key][$keyAccr]lacc_remark", ['class' => 'form-control']); ?></td>
                            <td><?= Html::button('<i class="ace-icon fa fa-trash bigger-110 icon-only"></i>', ['class' => 'btn btn-xs btn-pink btn-remove-ajax', 'data-id' => $laboratoriumAccreditation->id]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <hr/>

                <fieldset>
                    <div class="field-ppalaboratorium-test_value">
                        <label><?= AppLabels::LABOR_TEST_MONTH; ?></label>
                        <div class="row">
                            <?php
                            foreach ($laboratoriumModel->ppaLaboratoriumTests as $keyTest => $laboratoriumTest) {
                                echo Html::beginTag('div', ['class' => 'checkbox col-xs-12 col-sm-4']);
                                
                                echo Html::activeHiddenInput($laboratoriumTest, "[$key][$keyTest]id");
                                echo Html::activeHiddenInput($laboratoriumTest, "[$key][$keyTest]test_month");
                                echo Html::activeHiddenInput($laboratoriumTest, "[$key][$keyTest]test_year");
                                
                                echo Html::beginTag('label');
                                echo Html::checkbox("PpaLaboratoriumTest[$key][$keyTest][test_value]", $laboratoriumTest->test_value == 1, ['class' => 'ace']);
                                echo Html::beginTag('span', ['class' => 'lbl']);
                                echo ' ' . $startDate->format('M Y');
                                echo Html::endTag('span');
                                echo Html::endTag('label');
                                echo Html::endTag('div');
                                
                                $startDate->add(new \DateInterval('P1M'));
                            }
                            
                            ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <hr/>
<?php endforeach; ?>