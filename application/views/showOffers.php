<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="h1">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
  <?= $mainNav ?>
  </div>
  <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
    <section class="offers_container">
      <?php if ($offers == null): ?>
          W tej chwili nie ma żadnych ofert!<br>
      <?php else: ?>
        <?php foreach ($offers as $offer): ?>
          <?php if(date_create($offer->datetime)>date_create('now')):?>
          <a href="<?= site_url('Offer/'.$offer->id) ?>"class="offer">
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
</div>
</main>
