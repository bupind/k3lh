<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HousekeepingQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s', AppLabels::QUESTION, AppLabels::HOUSEKEEPING);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="housekeeping-question-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>
    <hr/>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                /*[
                    'attribute' => 'ppuq_question_type_code',
                    'value' => 'ppuq_question_type_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'ppuq_question_type_code', Codeset::customMap(AppConstants::CODESET_PPU_QUESTION_TYPE_CODE), ['class' => 'chosen-select form-control'])
                ],*/
                'hq_title',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
