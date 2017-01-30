<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main>
  <h1 class="h1">Dodaj ofertę</h1>
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
    <?= $mainNav ?>
    </div>
    <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
      <form class="offer_form" method="post">
        <div class="input"><label>Data:</label><input type="date" name="date" value="<?= date('Y-m-d') ?>"></div>
        <div class="input"><label>Czas:</label><input type="text" name="time" value="" placeholder="<?=date('H:i')?>"></div>
        <div class="input"><label>Telefon:</label><input type="text" name="phone" value="" placeholder="123456789"></div>
        <div class="input"><label>E-mail:</label><input type="email" name="email" value="" placeholder="example@mail.com"></div>
        <div class="input"><label>Miejsce:</label><input type="text" name="place" value="" placeholder="ul. Przykładowa 13/7 Opole"></div>
        <div class="input"><label>Cena (zł):</label><input type="number" name="price" value="" placeholder="200"></div>
        <label>Pokoje do sprzątania:</label>
        <label><input type="checkbox" name="rooms[]" value="bathroom"><span>Łazienka</span></label>
        <label><input type="checkbox" name="rooms[]" value="kitchen"><span>Kuchnia</span></label>
        <label><input type="checkbox" name="rooms[]" value="living_room"><span>Salon</span></label>
        <label><input type="checkbox" name="rooms[]" value="bedroom"><span>Sypialnia</span></label>
        <label>Czynności do wykonania:</label>
        <label><input type="checkbox" name="todos[]" value="clean_car"><span>Umycie samochodu</span></label>
        <label><input type="checkbox" name="todos[]" value="clean_windows"><span>Umycie okien</span></label>
        <div class="input"><input type="submit" value="Dodaj ofertę"></div>
      </form>
    </div>
  </div>
</main>
