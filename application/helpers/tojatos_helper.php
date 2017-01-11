<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('dump'))
{
    function dump($var)
    {
        echo "<pre><code>";
        var_dump($var);
        echo "</code></pre>";
    }
}
if ( ! function_exists('validateForm'))
{
    function validateForm($arr)
    {
      foreach ($arr as $msg => $var) {
        if($var == null) throw new Exception($msg);
        if(htmlentities($var, ENT_QUOTES, 'UTF-8')!=$var) throw new Exception("Proszę usunąć znaki specjalne!");

      }
    }
}
