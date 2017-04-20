<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Codeset;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Plb3SaQuestion;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Plb3SaQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s %s', AppLabels::QUESTION, AppLabels::PLB3, AppLabels::SELF_ASSESSMENT_SHORT);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-question-index">

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
                    'attribute' => 'category_code',
                    'value' => 'category_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'category_code', Codeset::customMap(AppConstants::CODESET_PLB3_SA_QUESTION_CATEGORY_CODE), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'input_type_code',
                    'value' => 'input_type_code_desc',
                    'filter' => Html::activeDropDownList($searchModel, 'input_type_code', Codeset::customMap(AppConstants::CODESET_PLB3_SA_QUESTION_INPUT_TYPE_CODE), ['class' => 'chosen-select form-control'])
                ],
                'label_short',
                [
                    'attribute' => 'parent_id',
                    'value' => 'parent.label_short',
                    'filter' => Html::activeDropDownList($searchModel, 'parent_id', Plb3SaQuestion::map(new Plb3SaQuestion(), 'label_short', null, 'label'), ['class' => 'chosen-select form-control'])
                ],
            
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
