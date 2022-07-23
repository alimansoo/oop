<?php
namespace App\Controllers;
use App\Classes\View;
use Resource\ControllerInterface;
class LoginController implements ControllerInterface{
    public static function Index($data = null)
    {
        View::IncludeMainPage('login');
    }
    public static function form(){
        echo "omadi";
    }
}