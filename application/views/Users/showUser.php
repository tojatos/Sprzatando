<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?= $user_message ?>
<?php if ($this->session->user_name == $user->login):  ?>
<form class="user_message_form" method="post">
  <h2 class="center">Zmiana opisu</h2>
  <div class="input"><label>Opis:</label><textarea name="message" placeholder="<?= $user_message ?>"></textarea></div>
  <div class="input"><input type="submit" value="Zmień opis"></div>
</form>
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
<?php else: ?>
  <?php if($haveFinishedTransaction): ?>
    <?= $addOpinionForm ?>
  <?php endif; ?>
<?php endif; ?>
