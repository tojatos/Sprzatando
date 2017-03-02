<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
  <div class="col-xs-12 col-lg-6">
		<div class="filter_offers">
		  <div class="input"><label>Cena minimalna (zł):</label><input type="number" name="min_price" value=""></div>
		  <div class="input"><label>Cena maksymalna (zł):</label><input type="number" name="max_price" value=""></div>
		  <label>Pokoje do sprzątania:</label>
		  <label><input type="checkbox" name="rooms[]" value="bathroom"><span>Łazienka</span></label>
		  <label><input type="checkbox" name="rooms[]" value="kitchen"><span>Kuchnia</span></label>
		  <label><input type="checkbox" name="rooms[]" value="living_room"><span>Salon</span></label>
		  <label><input type="checkbox" name="rooms[]" value="bedroom"><span>Sypialnia</span></label>
		  <label>Czynności do wykonania:</label>
		  <label><input type="checkbox" name="todos[]" value="clean_car"><span>Umycie samochodu</span></label>
		  <label><input type="checkbox" name="todos[]" value="clean_windows"><span>Umycie okien</span></label>
		  <div class="input"><button type="button" class="btn black-btn filter_button">Filtruj</button></div>
		</div>

  </div>
  <div class="col-xs-12 col-lg-6">
  <?= $showOffersContent ?>
  </div>
</div>
