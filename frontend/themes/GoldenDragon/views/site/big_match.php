<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
use yii\grid\GridView;
use backend\models\League;
use backend\models\Channel;
use kartik\widgets\DatePicker;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BigMatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('Jadwal Pertandingan Bola - %s', $webProfile->title_tag);
?>

<h1>Jadwal Pertandingan Bola</h1>

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-condensed table-small'],
        'columns' => [
            [
                'attribute' => 'league_id',
                'value' => 'league.league_name',
                'filter' => Html::activeDropDownList($searchModel, 'league_id', League::map(new League(), 'league_name'), ['class' => 'chosen-select form-control'])
            ],
            [
                'attribute' => 'channel_id',
                'value' => 'channel.channel_name',
                'filter' => Html::activeDropDownList($searchModel, 'channel_id', Channel::map(new Channel(), 'channel_name'), ['class' => 'chosen-select form-control'])
            ],
            [
                'attribute' => 'match_date',
                'value' => 'match_date',
                'format' => ['date', AppConstants::FORMAT_DATE_PHP],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'match_date',
                    'type' => DatePicker::TYPE_INPUT,
                    'options' => ['placeholder' => AppLabels::DATE],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ])
            ],
            'match',
        ],
    ]); ?>
</div>