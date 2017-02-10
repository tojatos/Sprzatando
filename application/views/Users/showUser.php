<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if ($this->session->user_name == $user->login):  ?>
<div class="row">
  <div class="col-xs-12 col-lg-6">
    <h2 class="h2">Twoje oferty:</h2>
    <?= $user_offers ?>
  </div>
  <div class="col-xs-12 col-lg-6">
    <h2 class="h2">Twoje zgłoszenia:</h2>
    <?= $user_par ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-lg-6">
    <h2 class="h2">Twoje zakończone oferty:</h2>
    <?= $user_fin_offers ?>
  </div>
  <div class="col-xs-12 col-lg-6">
    <h2 class="h2">Twoje zakończone zgłoszenia:</h2>
    <?= $user_fin_par ?>
  </div>
</div>
<?php endif; ?>
