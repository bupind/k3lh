<?php

use backend\models\MaturityLevelTitle;
use common\vendor\AppLabels;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaturityLevelQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s', AppLabels::QUESTION, AppLabels::MATURITY_LEVEL);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-question-index">

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
                    'attribute' => 'maturity_level_title_id',
                    'value' => 'maturityLevelTitle.title_text',
                    'filter' => Html::activeDropDownList($searchModel, 'maturity_level_title_id', MaturityLevelTitle::map(new MaturityLevelTitle(), 'title_text'), ['class' => 'chosen-select form-control'])
                ],
                [
                    'attribute' => 'q_action_plan',
                    'value' => 'actionPlanShort',
                    'format' => 'html'
                ],
                [
                        'attribute' => 'q_unit_code',
                    'value' => 'q_unit_code_desc'
                ],
                'q_weight',
                
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
