<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/snow.css">
    <script src="<?= base_url() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>js/scripts.js"></script>
    <meta charset="utf-8">
    <title>Skracacz linków</title>
  </head>
  <body>
  <div class="snow"></div>
  <div class="blur"></div>
  <div class="response"><div class="text"></div><div class="btn green-btn accept-response">Rozumiem</div></div>

<div class="center">404
  <br>
  <a href="<?= base_url() ?>">Powrót do strony głównej</a>
</div>
<audio controls autoplay loop class="audio">
  <source src="<?= base_url() ?>music/giveup.mp3" type="audio/mp3">
</audio>
</body>
</html>
