<section class="opinions">
<h2 class="h2">Opinie na temat tego użytkownika:</h2>
  <?php  if ($opinions == null): ?>
    <div class="dark center"> Ten użytkownik nie ma jeszcze żadnych opinii!</div>
  <?php else: ?>
    <?php foreach ($opinions as $opinion): ?>
      <div class="opinion">
        <ul>
          <li>Gwiazdki: <?= $opinion->stars ?></li>
          <li>Opis: <?= $opinion->description ?></li>
          <li>Wystawił użytkownik: <a href="<?= site_url('User/'.$opinion->from_user) ?>"><?= $opinion->from_user ?></a></li>
        </ul>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</section>
