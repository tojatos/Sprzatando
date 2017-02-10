<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
  foreach ($participants as $par){
    if(!$par->finished){
      array_pop($participants);
    }
  }
?>
<?php if ($participants == null): ?>
    W tej chwili nie ma tu żadnych zgłoszeń!<br>
<?php else: ?>
  <?php foreach ($participants as $par): ?>
    <div class="offer">
      <a href="<?= site_url('Offer/'.$par->offer_id) ?>">Link do oferty</a>
      <ul>
        <li>Cena: <?= $par->price ?></li>
        <li>Opis: <?= $par->text ?></li>
      </ul>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
