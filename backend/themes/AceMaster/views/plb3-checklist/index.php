<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3ChecklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $model backend\models\Plb3BalanceSheet */

$this->title = sprintf('Form %s %s %s',AppLabels::CHECKLIST, AppLabels::WASTE, $powerPlantModel->getSummary());
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-checklist-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title lighter"><?= AppLabels::BTN_ADD; ?></h5>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <?php $form = ActiveForm::begin([
                            'id' => 'plb3-checklist',
                            'options' => [
                                'class' => 'form-inline',
                                'role' => 'form'
                            ],
                        ]); ?>

                        <?php

                        echo $form->field($model, 'sector_id')->hiddenInput(['value' => $powerPlantModel->sector_id])->error(false)->label(false);
                        echo $form->field($model, 'power_plant_id')->hiddenInput(['value' => $powerPlantModel->id])->error(false)->label(false);

                        echo $form->field($model, 'plb3c_year')
                            ->textInput(['maxlength' => true, 'class' => 'form-control numbersOnly text-right'])
                            ->label(null, ['class' => 'inline'])
                            ->error(false);



                        echo Html::submitButton('<i class="ace-icon fa fa-check bigger-110"></i> ' . AppLabels::BTN_ADD, ['class' => 'btn btn-info btn-sm']);
                        ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'plb3c_year',

                [   'class' => 'yii\grid\ActionColumn',
                ],
            ],
        ]); ?>
    </div>
</div>