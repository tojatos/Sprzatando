<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="main-title">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-10">
    <section class="offers_container">
      <?php if ($offers == null): ?>
          W tej chwili nie ma żadnych ofert!<br>
      <?php else: ?>
        <?php foreach ($offers as $offer): ?>
          <?php if(date_create($offer->datetime)>date_create('now')):?>
          <a href="<?= base_url() ?>Offer/<?= $offer->id ?> "class="offer">
            <ul>
              <li>Czas: <?= $offer->datetime ?></li>
              <li>Miejsce: <?= $offer->place ?></li>
              <li>Cena: <?= $offer->price ?>zł</li>
            </ul>
          </a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </div>
  <div class="col-xs-2">
    <?= $mainNav ?>
  </div>
</div>
</main>
