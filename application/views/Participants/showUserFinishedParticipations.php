<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if ($participants != null){
  foreach ($participants as $key=>$par){
    if(!$par->finished){
      unset($participants[$key]);
    }
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
        <li>Id oferty: <?= $par->offer_id ?></li>
        <li>Cena: <?= $par->price ?></li>
        <li>Opis: <?= $par->text ?></li>
      </ul>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
