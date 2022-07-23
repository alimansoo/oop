<?php
namespace App\Classes;
class Header{
    public static function redirectTo($url){
        header("Location:$url");
    }
}