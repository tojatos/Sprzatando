<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="opinion_form" method="post">
  <label>Wystaw opinię:</label>
  <label><input type="radio" name="stars" value="1"><span>*</span></label>
  <label><input type="radio" name="stars" value="2"><span>**</span></label>
  <label><input type="radio" name="stars" value="3"><span>***</span></label>
  <label><input type="radio" name="stars" value="4"><span>****</span></label>
  <label><input type="radio" name="stars" value="5"><span>*****</span></label>
  <div class="input"><label>Opis:</label><input type="text" name="description" value=""></div>
  <input type="hidden" name="target_user" value="<?= $username ?>">
  <div class="input"><input type="submit" value="Wystaw opinię"></div>
</form>
