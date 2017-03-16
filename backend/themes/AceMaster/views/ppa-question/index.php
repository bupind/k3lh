<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PpaQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s', AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-question-index">

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
                    'attribute' => 'ppaq_question_type_code',
                    'value' => 'ppaq_question_type_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'ppaq_question_type_code', Codeset::customMap(AppConstants::CODESET_PPA_QUESTION_TYPE_CODE), ['class' => 'chosen-select form-control'])
                ],
                'ppaq_question:html',
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
