<?php
namespace App\Controllers;
use App\Classes\View;
use Resource\ControllerInterface;
class IndexController implements ControllerInterface{
    public static function Index($data=null){
        View::IncludeMainPage('home');
    }
}