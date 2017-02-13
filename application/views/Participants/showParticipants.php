<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="participants_container">
  <?php foreach ($participants as $par): ?>
    <div class="applicator">
      <ul>
        <li>Użytkownik: <a href="<?= site_url('User/'.$par->user) ?>"><?= $par->user ?></a></li>
        <li>Proponowana cena: <?= $par->price ?> zł</li>
        <li>Opis: <?= $par->text ?></li>
      </ul>
    <?php if(!$par->accepted): ?>
      <form class="accept_participant_form" method="post">
        <input type="hidden" name="id" value="<?= $par->id_participants ?>">
        <input type="hidden" name="offer_id" value="<?= $par->offer_id ?>">
        <input type="hidden" name="participant" value="<?= $par->user ?>">
        <input type="submit" value="Wybierz wykonawcę" class="btn black-btn">
      </form>
    <?php elseif ($par->accepted&&!$par->confirmed): ?>
      <div class="center">Zgłoszenie zaakceptowane, oczekiwanie na potwierdzenie</div>
    <?php elseif ($par->accepted&&$par->confirmed&&!$par->finished): ?>
      <form class="finish_offer_form" method="post">
        <input type="hidden" name="id" value="<?= $par->id_participants ?>">
        <input type="hidden" name="offer_id" value="<?= $par->offer_id ?>">
        <input type="submit" value="Potwierdź ukończenie oferty" class="btn black-btn">
      </form>
    <?php elseif ($par->accepted&&$par->confirmed&&$par->finished): ?>
      <div class="center">Oferta zakończona</div>
    <?php endif; ?>
    </div>
  <?php endforeach; ?>
</section>
