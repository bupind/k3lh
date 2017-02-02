<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use backend\models\Bank;
use backend\models\Game;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $games backend\models\Game[] */

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('Produk - %s', $webProfile->title_tag);
?>

<h1>Produk</h1>

<?php foreach ($games as $key => $game): ?>
    <div class="row">
        <div class="col-xs-12">
            <h3><?= sprintf('%s | %s', $game->gameCategory->gcat_name, $game->game_name); ?></h3>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?= Html::img(sprintf('%s%s/%s', AppConstants::FRONTEND_THEME_UPLOADED_WEB_IMG_PATH, strtolower($game->attachmentOwner->attachment->atf_location), $game->attachmentOwner->attachment->atf_filename), ['class' => 'img-responsive']); ?>
        </div>
        <div class="col-xs-12 col-sm-8">
            <p>
                <?= $game->game_description; ?>
                <?= Html::a(sprintf('Kunjungi Website %s', $game->game_name), $game->full_game_url, ['target' => 'blank']); ?>
            </p>
        </div>
    </div>
    <hr />
<?php endforeach; ?>
