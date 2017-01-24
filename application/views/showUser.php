<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
  <h1 class="h1">Profil użytkownika <?= $user->login ?></h1>
  <div class="row">
    <div class="col-xs-10">
      <h2 class="h2">Profil użytkownika <?= $user->login ?></h2>
    </div>
    <div class="col-xs-2">
      <?= $mainNav ?>
    </div>
  </div>
</main>
