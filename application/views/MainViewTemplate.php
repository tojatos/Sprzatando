<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main>
<h1 class="h1"><?= $title ?></h1>
<div class="row">
  <div class="col-xs-12 col-sm-5 col-sm-push-7 col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
  <?= $mainNav ?>
  </div>
  <div class="col-xs-12 col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
  <?= $content ?>
  </div>
</div>
</main>
