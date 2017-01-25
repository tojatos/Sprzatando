<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!$this->session->isLogged): ?>
<h1 class="h1">Sprzątando</h1>
<form class="login_form" method="post">
  <h2 class="center">Zaloguj się</h2>
  <div class="input"><label>Login:</label><input type="text" name="login" value="" placeholder="login"></div>
  <div class="input"><label>Hasło:</label><input type="password" name="password" value="" placeholder="password"></div>
  <div class="input"><input type="submit" value="Zaloguj się"></div>
</form>
<a href="<?= base_url() ?>" class="center">Powrót do strony głównej</a>
<?php
  else:
    header('Location: '.base_url());
  endif;
