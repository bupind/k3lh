<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Deposit */

?>
Hallo Admin,
Terdapat request deposit baru dengan rincian sebagai berikut:

Nama Lengkap: <?= $model->dps_name; ?>

Username / ID: <?= $model->dps_username; ?>

Email: <?= $model->dps_email; ?>

Jumlah Deposit: <?= Yii::$app->formatter->asCurrency($model->dps_amount); ?>

Permainan: <?= $model->game->game_name; ?>

Bank Penerima: <?= $model->dpsReceiverBank->bank_name; ?>

Bank Pengirim: <?= $model->dpsSenderBank->bank_name; ?>

Nama Pemilik Rekening: <?= $model->dps_account_name; ?>

No. Rekening: <?= $model->dps_account_no; ?>

IP Address: <?= $model->ip_address; ?>


Mohon untuk segera di follow up.
Terima kasih.
