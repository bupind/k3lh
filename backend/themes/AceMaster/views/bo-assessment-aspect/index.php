<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BoAssessmentAspectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = sprintf("%s %s", AppLabels::ASSESSMENT_ASPECT, AppLabels::BEYOND_OBEDIENCE);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bo-assessment-aspect-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="clearfix">
        <div class="pull-right">
            <?= Html::a(AppLabels::BTN_ADD, ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <hr/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'bo_form_type_code',
                'value' => 'bo_form_type_code_desc',
                'filter' => Html::activeDropDownList($searchModel, 'bo_form_type_code', Codeset::customMap(AppConstants::CODESET_NAME_BO_FORM_TYPE_CODE), ['class' => 'chosen-select form-control'])
            ],
            'boas_aspect',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
