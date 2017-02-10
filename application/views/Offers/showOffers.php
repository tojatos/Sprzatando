<section class="offers_container">
  <?php if ($offers == null): ?>
      W tej chwili nie ma tu żadnych ofert!<br>
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
