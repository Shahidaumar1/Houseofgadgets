<?php

namespace App\Helpers;

class SeoUrl{
    public static function encodeUrl($url){
        $lowercase = strtolower($url);
        $slug = str_replace(' ', '-', $lowercase);
        return $slug;
    }


    public static function decodeUrl($url){
        $lowercase = strtolower($url);
        $slug = str_replace('-', ' ', $lowercase);
        return $slug;
    }
}
