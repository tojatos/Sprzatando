<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<a href="<?= site_url() ?>" class="btn purple-btn center">Strona główna</a>
<?php if (!$this->session->isLogged): ?>
  <a href="<?= site_url('Register') ?>" class="btn black-btn center">Zarejestruj się</a>
  <a href="<?= site_url('Login') ?>" class="btn green-btn center">Zaloguj się</a>
<?php else: ?>
  <form class="logout_form" method="post">
    <input class="btn black-btn center" type="submit" value="Wyloguj się">
  </form>
  <a href="<?= site_url('User/'.$this->session->user_name) ?>" class="btn green-btn center">Profil</a>
  <a href="<?= site_url('AddOffer') ?>" class="btn green-btn center">Dodaj ofertę</a>
  <a href="<?= site_url('Offers') ?>" class="btn green-btn center">Szukaj ofert</a>
<?php endif; ?>
