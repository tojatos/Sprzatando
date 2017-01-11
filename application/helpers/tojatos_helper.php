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
