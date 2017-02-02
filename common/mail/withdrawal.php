<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Withdrawal */

?>
Hallo Admin,
Terdapat request penarikan baru dengan rincian sebagai berikut:

Nama Lengkap: <?= $model->wd_name; ?>

Username / ID: <?= $model->wd_username; ?>

Email: <?= $model->wd_email; ?>

Jumlah Penarikan: <?= Yii::$app->formatter->asCurrency($model->wd_amount); ?>

Permainan: <?= $model->game->game_name; ?>

Bank Penerima: <?= $model->wdReceiverBank->bank_name; ?>

Nama Pemilik Rekening: <?= $model->wd_account_name; ?>

No. Rekening: <?= $model->wd_account_no; ?>

IP Address: <?= $model->ip_address; ?>


Mohon untuk segera di follow up.
Terima kasih.
