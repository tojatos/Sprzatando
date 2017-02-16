<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="offer_container">
<?php
  $rooms = [
  '<li>Łazienka</li>' => $offer->bathroom,
  '<li>Kuchnia</li>' => $offer->kitchen,
  '<li>Salon</li>' => $offer->living_room,
  '<li>Sypialnia</li>' => $offer->bedroom,
  ];
  $todos = [
  '<li>Umycie auta</li>' => $offer->clean_car,
  '<li>Umycie okien</li>' => $offer->clean_windows,
  ]; ?>
  <ul>
    <li>Czas: <?= $offer->datetime ?></li>
    <li>Miejsce: <?= $offer->place ?></li>
    <li>Cena: <?= $offer->price ?>zł</li>
    <li>Email: <?= $offer->email ?></li>
    <li>Numer telefonu: <?= $offer->phone ?></li>
    <li>User: <a href="<?= site_url('User/'.$offer->user) ?>"><?= $offer->user ?></a></li>
    <?php if (array_sum($rooms) != 0): ?>
    <li>Pokoje do sprzątania:
      <ul>
        <?php foreach ($rooms as $text => $bool): ?>
            <?= ($bool == false) ? '' : $text; ?>
        <?php endforeach; ?>
      </ul>
    </li>
  <?php endif; ?>

  <?php if (array_sum($todos) != 0): ?>
    <li>Czynności do wykonania:
      <ul>
        <?php foreach ($todos as $text => $bool): ?>
            <?= ($bool == false) ? '' : $text; ?>
        <?php endforeach; ?>
      </ul>
    </li>
  <?php endif; ?>
  </ul>
  <?php if(!$offer->active && $offer->user != $this->session->user_name): ?>
    <div class="dark center">Ta oferta jest już zakończona!</div>
  <?php elseif($offer->user != $this->session->user_name): ?>
  <form class="participate_form" method="post">
    <div class="input"><label>Proponowana cena: (zł)</label><input type="number" name="price" value=""></div>
    <div class="input"><label>Opis:</label><textarea name="text" placeholder="Opisz swoją propozycję"></textarea></div>
    <input type="hidden" name="offer_id" value="<?= $offer->id_offers ?>">
    <div class="input"><input type="submit" value="Zgłoś się do oferty"></div>
  </form>
  <?php elseif($confirmedState): ?>
    <div class="dark center">Oferta potwierdzona, <a class="btn black-btn" href="<?= site_url('Participants/'.$offer->id_offers) ?>">Zobacz zaakceptowane zgłoszenie</a></div>
  <?php else: ?>
    <a class="btn black-btn center" href="<?= site_url('Participants/'.$offer->id_offers) ?>">Zobacz zgłoszenia</a>
  <?php endif; ?>
</section>
