<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if (!isset($_SESSION['logged'])): ?>
<a href="<?= base_url() ?>" class="btn purple-btn center">Strona główna</a>
<a href="<?= base_url() ?>Register" class="btn black-btn center">Zarejestruj się</a>
<a href="<?= base_url() ?>Login" class="btn green-btn center">Zaloguj się</a>
<?php else: ?>
<a href="<?= base_url() ?>" class="btn purple-btn center">Strona główna</a>
  <form class="logout_form" method="post">
    <input class="btn black-btn center" type="submit" value="Wyloguj się">
  </form>
  <a href="<?= base_url() ?>AddOffer" class="btn green-btn center">Dodaj ofertę</a>
  <a href="<?= base_url() ?>Offers" class="btn green-btn center">Szukaj ofert</a>
<?php endif; ?>
