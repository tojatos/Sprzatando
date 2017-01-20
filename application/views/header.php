<?php defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION))
    {
        session_start();
    }  ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= base_url() ?>css/main.css">
    <script src="<?= base_url() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>js/main.js"></script>
    <meta charset="utf-8">
    <title>Sprzątando</title>
  </head>
  <body>
  <div class="blur"></div>
  <div class="loading"></div>
  <div class="response"><div class="text"></div><div class="btn green-btn accept-response">Rozumiem</div></div>
