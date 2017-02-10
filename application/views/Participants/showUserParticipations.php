<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if ($participants != null){
  foreach ($participants as $par){
    if($par->finished){
      array_pop($participants);
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
        <li>Cena: <?= $par->price ?></li>
        <li>Opis: <?= $par->text ?></li>
        <li>Zaakceptowana: <?= $par->accepted ? "Tak" : "Nie" ?></li>
        <?php if($par->accepted&&!$par->confirmed): ?>
          <a href="#" class="btn black-btn">Potwierdź udział w ofercie</a>
        <?php elseif($par->accepted&&$par->confirmed): ?>
          Potwierdziłeś udział w ofercie!<br>
          Oferta nie została jeszcze oznaczona jako ukończona.
        <?php endif ?>
      </ul>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
