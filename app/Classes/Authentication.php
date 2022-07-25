<?php


namespace App\Classes;


class Authentication
{
    public static function Logedin(){
        if (isset($_SESSION['id'])){
            return true;
        }
        return false;
    }
}