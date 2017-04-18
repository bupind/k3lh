<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\Codeset;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s %s %s', AppLabels::QUESTION, AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::B3);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-question-index">

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

                [
                    'attribute' => 'plb3_form_type_code',
                    'value' => 'plb3_form_type_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'plb3_form_type_code', Codeset::customMap(AppConstants::CODESET_PLB3_CHECKLIST_FORM_TYPE_CODE), ['class' => 'chosen-select form-control'])
                ],

                [
                    'attribute' => 'plb3_question_type_code',
                    'value' => 'plb3_question_type_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'plb3_question_type_code', Codeset::customMap(AppConstants::CODESET_PLB3_QUESTION_TYPE_CODE), ['class' => 'chosen-select form-control'])
                ],
                'plb3_question:html',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
