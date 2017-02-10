<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h2 class="h2">Witaj na naszym serwisie!</h2>
<p>Sprzątando to platforma łącząca ludzi posiadających srogie hacjendy z ludźmi mającymi ręce i minimum zdolności manualnych, żeby posprzątać.</p>
<?php if (!$this->session->isLogged): ?>
<p>Aby korzystać z serwisu, musisz się <a href="<?= site_url('Login') ?>">zalogować</a>.</p>
<?php endif; ?>
