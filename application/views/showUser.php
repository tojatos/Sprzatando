<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main>
  <h1 class="h1">Profil użytkownika <?= $user->login ?></h1>
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
    <?= $mainNav ?>
    </div>
    <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
      <h2 class="h2">Profil użytkownika <?= $user->login ?></h2>
      <?php if($this->session->user_name == $user->login):  ?>
      <div class="row">
        <div class="col-xs-12 col-lg-6">
          <h2 class="h2">Twoje oferty:</h2>
          <?php foreach ($user_offers as $offer): ?>
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
        </div>
        <div class="col-xs-12 col-lg-6">
          <h2 class="h2">Twoje zgłoszenia</h2>
          <?php foreach ($participant_offers as $offer): ?>
            <div class="offer">
              <a href="<?= site_url('Offer/'.$offer->offer_id) ?>">Link do oferty</a>
              <ul>
                <li>Cena: <?= $offer->price ?></li>
                <li>Opis: <?= $offer->text ?></li>
                <li>Zaakceptowana: <?= $offer->accepted ? "Tak" : "Nie" ?></li>
                <?php if($offer->accepted&&!$offer->confirmed): ?>
                  <a href="#" class="btn black-btn">Potwierdź uczestnictwo w ofercie</a>
                <?php endif ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
</main>
