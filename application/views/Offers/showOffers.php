<?php
if ($offers != null) {
    //dump($offers);
  foreach ($offers as $key => $offer) {
      if (date_create($offer->datetime) <= date_create('now') || !$offer->active) {
          unset($offers[$key]);
      }
  }
}
?>
<section class="offers_container">
  <?php if ($offers == null): ?>
      W tej chwili nie ma tu żadnych ofert!<br>
  <?php else: ?>
    <?php foreach ($offers as $offer): ?>
      <a href="<?= site_url('Offer/'.$offer->id_offers) ?>"
        class="offer"
        data-price="<?= $offer->price ?>"
        data-bathroom="<?= $offer->bathroom ?>"
        data-living_room="<?= $offer->living_room ?>"
        data-kitchen="<?= $offer->kitchen ?>"
        data-bedroom="<?= $offer->bedroom ?>"
        data-clean_car="<?= $offer->clean_car ?>"
        data-clean_windows="<?= $offer->clean_windows ?>">
        <ul>
          <li>Czas: <?= $offer->datetime ?></li>
          <li>Miejsce: <?= $offer->place ?></li>
          <li>Cena: <?= $offer->price ?>zł</li>
        </ul>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
</section>
