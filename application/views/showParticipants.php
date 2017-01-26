<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="h1">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-10">
    <section class="participants_container">
        <?php foreach ($participants as $par): ?>
          <ul class="applicator">
            <li>Użytkownik: <a href="<?= site_url('User/'.$par->user) ?>"><?= $par->user ?></a></li>
            <li>Proponowana cena: <?= $par->price ?> zł</li>
            <li>Opis: <?= $par->text ?></li>
          </ul>
        <?php endforeach; ?>
    </section>
  </div>
  <div class="col-xs-2">
    <?= $mainNav ?>
  </div>
</div>
</main>
