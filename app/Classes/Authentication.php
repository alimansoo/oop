<?php


namespace App\Classes;


use App\models\User;

class Authentication
{
    public static function Logedin(){
        if (isset($_SESSION['email']) && !isset($_SESSION['redirectTo']) && $_SESSION['redirectTo']!==true){
            return true;
        }
        return false;
    }
    public static function Admin(){
        if (isset($_SESSION['email'])){
            $user = new User($_SESSION['email']);
            if ($user->usertypeId === 1)
                return true;
        }
        return false;
    }
    public static function MaxBuy($verifStatus){
        $maxBuy = [
            1=>5000000,
            2=>7000000,
            3=>10000000,
            4=>30000000,
        ];
        return $maxBuy[$verifStatus];
    }
    public static function NextLevel($verifStatus){
        $nextLevel = [
            1=>'<a href="http://localhost/ElectronicShop/veriflevel2">احراز هویت مرحله 2</a>',
            2=>'<a href="http://localhost/ElectronicShop/veriflevel2">احراز هویت مرحله 2</a>',
            3=>'<a href="http://localhost/ElectronicShop/veriflevel3">احراز هویت مرحله 3</a>',
            4=>'',
        ];
        return $nextLevel[$verifStatus];
    }
}