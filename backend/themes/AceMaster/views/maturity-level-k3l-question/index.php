<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use backend\models\MaturityLevelK3lTitle;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaturityLevelK3lQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf('%s %s', AppLabels::QUESTION, AppLabels::MATURITY_LEVEL_K3L);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-k3l-question-index">

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
                    'attribute' => 'maturity_level_k3l_title_id',
                    'value' => 'maturityLevelK3lTitle.title_text',
                    'filter' => Html::activeDropDownList($searchModel, 'maturity_level_k3l_title_id', MaturityLevelK3lTitle::map(new MaturityLevelK3lTitle(), 'title_text'), ['class' => 'chosen-select form-control'])
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
