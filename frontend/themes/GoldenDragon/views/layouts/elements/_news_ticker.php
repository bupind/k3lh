<?php
use yii\helpers\Html;
?>

<div class="col-xs-12 news-ticker-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="nt-box">
                    <?php if (isset($this->params['newsTickers'])): ?>
                        <ul class="list list-unstyled" id="news-ticker">
                            <?php foreach ($this->params['newsTickers'] as $ticker): ?>
                                <li><?= $ticker->ticker_content; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-6 togel-wrapper">
                <?php if (isset($this->params['togel'])): ?>
                    <span class="togel-box">
                        <?= sprintf('<span class="togel-intro">sgp / %s:</span> <span class="togel-result blinkme">%s</span>', Yii::$app->formatter->asDate($this->params['togel']->togel_date, 'php:d M Y'), Html::a($this->params['togel']->togel_result, ['/togel'], ['title' => 'Lihat semua'])); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>