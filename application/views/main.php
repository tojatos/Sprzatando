<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main>
<h1 class="h1">Sprzątando</h1>
<div class="row">
<div class="col-xs-10">
  <h2 class="h2">Witaj na naszym serwisie aukcyjnym!</h2>
  <p>Sprzątando to platforma łącząca ludzi posiadających srogie hacjendy z ludźmi mającymi ręce i minimum zdolności manualnych, żeby posprzątać.</p>
  <?php if (!isset($_SESSION['logged'])): ?>
  <p>Aby korzystać z serwisu, musisz się <a href="<?= base_url() ?>Login">zalogować</a>.</p>
  <?php endif; ?>
</div>
  <div class="col-xs-2">
    <?= $mainNav ?>
  </div>
</div>
</main>
