<?php
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\vendor\AppConstants;

/* @var $popup backend\models\Popup */
/* @var $this \yii\web\View */

$popup = isset($this->params['popup']) ? $this->params['popup'] : null;
?>

<?php if (!is_null($popup)): ?>
    
    <?php $this->registerJs("$('#popup').modal('show');", View::POS_READY); ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" style="color: #222;" id="myModalLabel"><?= $popup->popup_title; ?></h4>
                        </div>
                        <div class="modal-body">
                            <?= Html::img(sprintf('%s%s/%s', AppConstants::FRONTEND_THEME_UPLOADED_WEB_IMG_PATH, strtolower($popup->attachmentOwner->attachment->atf_location), $popup->attachmentOwner->attachment->atf_filename), ['class' => 'img-responsive']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>