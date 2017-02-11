<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, AppLabels::SMK3_TITLE);
$this->params['breadcrumbs'][] = ['label' => AppLabels::SMK3_TITLE, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smk3-title-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?= $this->params['subtitle']; ?>
                </small>
            <?php endif; ?>
        </h1>
    </div>

    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title"><?= $model->sttl_title ?></h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-sm-5">
                            <ol>
                                <?php foreach ($model->smk3Subtitles as $key => $subtitle): ?>
                                    <li>
                                        <p><?= $subtitle->ssub_subtitle; ?></p>
                                        <ol>
                                            <?php foreach($subtitle->smk3Criterias as $key1 => $criteria): ?>
                                                <li><p><?= $criteria->sctr_criteria ?></p></li>
                                            <?php  endforeach; ?>
                                        </ol>
                                    </li>
                                <?php  endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= ViewButton::widget(['model' => $model]); ?>
</div>
