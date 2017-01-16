<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="main-title">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-8">
    <section class="offers_container">
      <?php if ($offers == null): ?>
          W tej chwili nie ma żadnych ofert!<br>
      <?php else: ?>
        <?php foreach ($offers as $offer): ?>
          <a href="<?= base_url() ?>Offer/<?= $offer->id ?>"><div class="offer">
            <ul>
              <li>Data: <?= $offer->datetime ?></li>
              <li>Miejsce: <?= $offer->place ?></li>
            </ul>
          </div></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </div>
  <div class="col-xs-4">
    <?= $mainNav ?>
  </div>
</div>
</main>
