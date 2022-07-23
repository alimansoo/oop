<?php
namespace App\Controllers;
use App\Classes\View;

class RegisterController{
    public static function Index(){
        View::IncludeMainPage("register");
    }
    public static function Register(){
        View::IncludeMainPage("register");
    }
}