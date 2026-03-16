<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('limit_text')) {

    function limit_text($text, $limit = 20)
    {
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        if(strlen($text) > $limit){
            return '<span title="'.$text.'">'.substr($text,0,$limit).'...</span>';
        } else {
            return $text;
        }

    }

}