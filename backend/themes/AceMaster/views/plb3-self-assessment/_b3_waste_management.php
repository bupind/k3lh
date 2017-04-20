<?php

use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use app\components\DetailView;
use backend\models\PpaQuestion;
use common\components\helpers\Converter;
use backend\models\Plb3SaQuestion;

/* @var $this yii\web\View */
/* @var $model \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $questionGroups \backend\models\Codeset[] */
/* @var $plb3SaFormDetailModels \backend\models\Plb3SaFormDetail[] */
/* @var $plb3SaFormDetailStaticModel \backend\models\Plb3SaFormDetailStatic */
/* @var $plb3SaFormDetailStaticQuarterModels \backend\models\Plb3SaFormDetailStaticQuarter[] */

$no = 1;
$index = 0;

?>
<div class="plb3-self-assessment-view">
    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($questionGroups as $qKey => $qGroup):; ?>
                <?= $this->render('_category_' . strtolower($qGroup->cset_code), [
                    'codeset' => $qGroup,
                    'model' => $model,
                    'index' => $index,
                    'startDate' => $startDate,
                    'plb3SaFormDetailModels' => $plb3SaFormDetailModels,
                    'plb3SaFormDetailStaticModel' => $plb3SaFormDetailStaticModel,
                    'plb3SaFormDetailStaticQuarterModels' => $plb3SaFormDetailStaticQuarterModels
                ]); ?>
                <?php $index += Plb3SaQuestion::find()->where(['category_code' => $qGroup->cset_code])->count(); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
