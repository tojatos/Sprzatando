<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
if ($participants != null){
  foreach ($participants as $key=>$par){
    if($par->finished){
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
        <li>Cena: <?= $par->price ?></li>
        <li>Opis: <?= $par->text ?></li>
        <li>Zaakceptowana: <?= $par->accepted ? "Tak" : "Nie" ?></li>
        <?php if($par->accepted&&!$par->confirmed): ?>
          <form class="confirm_form" method="post">
            <div class="input"><input type="submit" class="btn black-btn" value="Potwierdź udział w ofercie"></div>
          </form>
        <?php elseif($par->accepted&&$par->confirmed): ?>
          Potwierdziłeś udział w ofercie!<br>
          Oferta nie została jeszcze oznaczona jako ukończona.
        <?php endif ?>
      </ul>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
