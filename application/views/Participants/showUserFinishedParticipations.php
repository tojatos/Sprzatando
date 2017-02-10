<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if ($participants == null): ?>
    W tej chwili nie ma tu żadnych zgłoszeń!<br>
<?php else: ?>
  <?php foreach ($participants as $par): ?>
    <?php if($par->finished):?>
    <div class="offer">
      <a href="<?= site_url('Offer/'.$par->offer_id) ?>">Link do oferty</a>
      <ul>
        <li>Cena: <?= $par->price ?></li>
        <li>Opis: <?= $par->text ?></li>
      </ul>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>
