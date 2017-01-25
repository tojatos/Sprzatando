<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="h1">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-10">
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
          <?php if($offer->user != $this->session->user_name): ?>
          <form class="participate_form" method="post">
            <div class="input"><label>Proponowana cena:</label><input type="number" name="price" value=""></div>
            <div class="input"><label>Opis:</label><textarea name="text" placeholder="Opisz swoją propozycję"></textarea></div>
            <div class="input"><input type="submit" value="Zgłoś się do oferty"></div>
          </form>
          <?php else: ?>
            <a class="btn black-btn center" href="<?= site_url('Applications/'.$offer->id) ?>">Zobacz zgłoszenia</a>
          <?php endif; ?>
    </section>
  </div>
  <div class="col-xs-2">
    <?= $mainNav ?>
  </div>
</div>
</main>
