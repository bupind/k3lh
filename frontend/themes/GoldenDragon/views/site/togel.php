<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BigMatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('Hasil Togel - %s', $webProfile->title_tag);
?>

<h1>Hasil Togel</h1>

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-condensed table-small'],
        'columns' => [
            [
                'attribute' => 'togel_date',
                'value' => 'togel_date',
                'format' => ['date', AppConstants::FORMAT_DATE_PHP],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'togel_date',
                    'type' => DatePicker::TYPE_INPUT,
                    'options' => ['placeholder' => AppLabels::DATE],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ])
            ],
            'togel_result',
        ],
    ]); ?>
</div>