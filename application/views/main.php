<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main>
<h1 class="main-title">Sprzątando</h1>
<div class="row">
<div class="col-xs-8">
  Witaj na naszym serwisie aukcyjnym! <br>
  Sprzątando to platforma łącząca ludzi posiadających srogie hacjendy z ludźmi mającymi ręce i minimum zdolności manualnych, żeby posprzątać.
</div>
  <div class="col-xs-4">
    <?php if (!isset($_SESSION['logged'])): ?>
    <a href="<?= base_url() ?>Register" class="btn black-btn center">Zarejestruj się</a>
    <a href="<?= base_url() ?>Login" class="center">Mam już konto</a>
    <?php else: ?>
      <form class="logout_form" method="post">
        <input class="btn black-btn center" type="submit" value="Wyloguj się">
      </form>
    <?php endif; ?>
  </div>
</div>
</main>
