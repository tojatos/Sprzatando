<?php

defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('dump')) {
    function dump($var)
    {
        echo '<pre><code>';
        var_dump($var);
        echo '</code></pre>';
    }
}
if (!function_exists('dump_p')) {
    function dump_p($var)
    {
        echo '<pre><code>';
        var_dump(htmlentities($var));
        echo '</code></pre>';
    }
}
if (!function_exists('validateForm')) {
    //example array -  ['Nie zapomnij o e-mail\'u!' => $email]
    function validateForm($arr)
    {
        foreach ($arr as $msg => $var) {
            if ($var == null) {
                throw new Exception($msg);
            }

            if (strpos($var, '"') !== false||strpos($var, "'") !== false) {
                throw new Exception("Proszę usunąć apostrofy i cudzysłowia!");
            }
        }
    }
}
