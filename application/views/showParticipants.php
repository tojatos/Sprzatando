<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
<h1 class="h1">Pokaż oferty</h1>
<div class="row">
  <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
  <?= $mainNav ?>
  </div>
  <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
    <section class="participants_container">
        <?php foreach ($participants as $par): ?>
          <?php if ($par->accepted==true): ?>
            <div class="applicator">
              <ul>
                <li>Użytkownik: <a href="<?= site_url('User/'.$par->user) ?>"><?= $par->user ?></a></li>
                <li>Proponowana cena: <?= $par->price ?> zł</li>
                <li>Opis: <?= $par->text ?></li>
              </ul>
              <div class="center">Oferta zaakceptowana, oczekiwanie na potwierdzenie </div>
            </div>
          <?php else: ?>
          <div class="applicator">
            <ul>
              <li>Użytkownik: <a href="<?= site_url('User/'.$par->user) ?>"><?= $par->user ?></a></li>
              <li>Proponowana cena: <?= $par->price ?> zł</li>
              <li>Opis: <?= $par->text ?></li>
            </ul>
            <form class="accept_participant_form" method="post">
              <input type="hidden" name="id" value="<?= $par->id ?>">
              <input type="hidden" name="offer_id" value="<?= $par->offer_id ?>">
              <input type="hidden" name="participant" value="<?= $par->user ?>">
              <input type="submit" value="Wybierz wykonawcę" class="btn black-btn">
            </form>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>
    </section>
  </div>
</div>
</main>
