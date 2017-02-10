<?php
if ($offers != null){
  foreach ($offers as $offer){
    if(date_create($offer->datetime)>date_create('now')){
      array_pop($offers);
    }
  }
}
?>
<section class="offers_container">
  <?php if ($offers == null): ?>
      W tej chwili nie ma tu żadnych ofert!<br>
  <?php else: ?>
    <?php foreach ($offers as $offer): ?>
      <a href="<?= site_url('Offer/'.$offer->id) ?>"class="offer">
        <ul>
          <li>Czas: <?= $offer->datetime ?></li>
          <li>Miejsce: <?= $offer->place ?></li>
          <li>Cena: <?= $offer->price ?>zł</li>
        </ul>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
</section>
