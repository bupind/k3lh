<?php

use yii\helpers\Html;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $newsList [] */
/* @var $posts backend\models\Post[] */
/* @var $bigMatch backend\models\BigMatch */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('%s - %s', $webProfile->app_name, $webProfile->title_tag);
?>

<?php if (!is_null($bigMatch)): ?>
    <!-- begin big match -->
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 big-match-wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-3 club-thumb">
                    <?= Html::img(sprintf('%s%s/%s', AppConstants::FRONTEND_THEME_UPLOADED_WEB_IMG_PATH, strtolower($bigMatch->bigMatchDetails[0]->club->attachmentOwner->attachment->atf_location), $bigMatch->bigMatchDetails[0]->club->attachmentOwner->attachment->atf_filename), ['class' => 'img-responsive']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="row">
                        <div class="col-xs-12 league"><?= $bigMatch->league->league_name; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <span class="club-name"><?= $bigMatch->bigMatchDetails[0]->club->club_name; ?></span>
                            <i class="power-bar" style="width: <?= $bigMatch->bigMatchDetails[0]->bmd_rate_percentage; ?>%;"></i>
                            <span class="club-info">Kekuatan: <?= $bigMatch->bigMatchDetails[0]->bmd_rate_percentage; ?>%</span>
                            <span class="club-info">Handicap: <?= $bigMatch->bigMatchDetails[0]->bmd_handicap; ?></span>
                            <div class="space-12 visible-xs"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span class="club-name"><?= $bigMatch->bigMatchDetails[1]->club->club_name; ?></span>
                            <i class="power-bar right" style="width: <?= $bigMatch->bigMatchDetails[1]->bmd_rate_percentage; ?>%;"></i>
                            <span class="club-info">Kekuatan: <?= $bigMatch->bigMatchDetails[1]->bmd_rate_percentage; ?>%</span>
                            <span class="club-info">Handicap: <?= $bigMatch->bigMatchDetails[1]->bmd_handicap; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 club-thumb">
                    <?= Html::img(sprintf('%s%s/%s', AppConstants::FRONTEND_THEME_UPLOADED_WEB_IMG_PATH, strtolower($bigMatch->bigMatchDetails[1]->club->attachmentOwner->attachment->atf_location), $bigMatch->bigMatchDetails[1]->club->attachmentOwner->attachment->atf_filename), ['class' => 'img-responsive']); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end big match -->
<?php endif; ?>

<!-- begin latest news -->
<div class="row">
    <div class="col-xs-12">
        <div class="container">
            <?php foreach ($newsList as $posts): ?>
                <div class="row latest-news-wrapper">
                    <?php foreach ($posts as $key => $post): ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="row ln-box <?= $key == 0 ? 'left' : 'right'; ?>">
                                <div class="col-xs-12 col-md-4 <?= $key == 0 ? 'col-md-push-8' : ''; ?> ln-thumb">
                                    <?= Html::a('<i class="cover"></i>' . Html::img($post->featured_img['src']), ['/' . $post->slug], ['title' => $post->post_title, 'width' => 250, 'height' => 140]); ?>
                                </div>
                                <div class="col-xs-12 col-md-8 <?= $key == 0 ? 'col-md-pull-4' : ''; ?> ln-desc">
                                    <h4><?= Html::a($post->post_title, ['/' . $post->slug]); ?></h4>
                                    <?= $post->post_intro; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            
            <div class="space-12"></div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 margin-bottom-30 text-center">
                    <?= Html::a('Berita Lainnya', ['/berita'], ['class' => 'btn-me btn-me-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->

<!-- begin post content -->
<div class="row bg-gold-1">
    <div class="col-xs-12">
        <div class="container">
            <div class="row post">
                <div class="col-xs-12 col-sm-4">
                    <?= $webProfile->profile_left; ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?= $webProfile->profile_center; ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?= $webProfile->profile_right; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- begin post content -->
