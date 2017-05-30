<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $filename string */
/* @var $downloadPath string */

$this->title = sprintf('%s %s %s', AppLabels::DOWNLOAD, AppLabels::FILE, $filename);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-form">
    <div class="col-xs-12">
        <h1 class="grey lighter smaller">
            <span class="blue bigger-125">
                <i class="ace-icon fa fa-download"></i>
                <?= AppConstants::MSG_DOWNLOAD_SUCCESS; ?>
            </span>
        </h1>
        <hr>
        <h3 class="lighter smaller"><?= sprintf('%s: %s', AppLabels::FILENAME, $filename); ?></h3>
        <hr>
        <div class="space"></div>
        <div class="center">
            <?= Html::a('<i class="ace-icon fa fa-tachometer"></i>' . AppLabels::DASHBOARD, ['/site'], ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>
