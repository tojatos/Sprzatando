<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="main-title">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-10">
    <section class="offer_container">
      <?php if ($offer == null): ?>
          Nie ma takiej oferty w bazie<br>
      <?php else: ?>
        <?php $rooms = array(
          "<li>Łazienka</li>" => $offer->bathroom,
          "<li>Kuchnia</li>" => $offer->kitchen,
          "<li>Salon</li>" => $offer->living_room,
          "<li>Sypialnia</li>" => $offer->bedroom
        ); ?>
        <?php $todos = array(
          "<li>Umycie auta</li>" => $offer->clean_car,
          "<li>Umycie okien</li>" => $offer->clean_windows,
        ); ?>
          <ul>
            <li>Czas: <?= $offer->datetime ?></li>
            <li>Miejsce: <?= $offer->place ?></li>
            <li>Cena: <?= $offer->price ?>zł</li>
            <li>Email: <?= $offer->email ?></li>
            <li>Numer telefonu: <?= $offer->phone ?></li>
            <?php if(array_sum($rooms)!=0): ?>
            <li>Pokoje do sprzątania:
              <ul>
                <?php foreach ($rooms as $text => $bool): ?>
                    <?= ($bool == false) ? '' : $text; ?>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(array_sum($todos)!=0): ?>
            <li>Czynności do wykonania:
              <ul>
                <?php foreach ($todos as $text => $bool): ?>
                    <?= ($bool == false) ? '' : $text; ?>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
          </ul>
      <?php endif; ?>
    </section>
  </div>
  <div class="col-xs-2">
    <?= $mainNav ?>
  </div>
</div>
</main>
