<?php
use yii\helpers\Html;
?>

<?php if ($show == 'support') { ?>
    <?php if (isset($this->params['supports'])): ?>
        <ul class="list list-unstyled list-inline support-wrapper">
        <?php foreach ($this->params['supports'] as $support): ?>
            <li class="support <?= strtolower($support->supp_type_code); ?>">
                <?= $support->supp_value; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php } else if ($show == 'bank-schedule') { ?>
    <?php if (isset($this->params['supports'])): ?>
        <ul class="list list-unstyled bank-offline-wrapper">
        <?php foreach ($this->params['banks'] as $bank): ?>
            <li>
                <div class="bs-bank-info <?= strtolower($bank->bank_name); ?>">
                    <span class="bs-bank-status <?= strtolower($bank->bank_status); ?>"><?= strtolower($bank->bank_status); ?></span>
                </div>
            <?php foreach ($bank->bankSchedules as $schedule): ?>
                <p><?= sprintf('%s: %s WIB', $schedule->bs_day, $schedule->offline_time); ?></p>
            <?php endforeach; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php } else if ($show == 'bonus') { ?>
    <ul class="list list-unstyled list-inline bonus-wrapper">
        <li><?= Html::a('<span class="bonus bonus-depo">50% Bonus Deposit</span>', ['/promo-bonus-deposit-5']); ?></li>
        <li><?= Html::a('<span class="bonus komisi-rollingan">0,7% Komisi Rollingan</span>', ['/komisi-rollingan-07']); ?></li>
        <li><?= Html::a('<span class="bonus komisi-referral">Komisi Referral MGM Seumur Hidup</span>', ['/komisi-referral-mgm-seumur-hidup']); ?></li>
        <li><?= Html::a('<span class="bonus cashback-sportbook">Cashback Up To 10%</span>', ['/cashback-up-10-sportbook']); ?></li>
        <li><?= Html::a('<span class="bonus cashback-casino">Cashback Casino Games 3%</span>', ['/cashback-casino-games-3']); ?></li>
    </ul>
<?php } else if ($show == 'other-info') { ?>
    <ul class="list list-unstyled common-list">
        <li><?= Html::a('Peraturan', ['/peraturan-naga188']); ?></li>
        <li><?= Html::a('Panduan', ['/panduan']); ?></li>
        <li><?= Html::a('Tentang Kami', ['/tentang-kami']); ?></li>
    </ul>
<?php } ?>
