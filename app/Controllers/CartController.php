<?php
namespace App\Controllers;
use App\Classes\View;
use Resource\ControllerInterface;

class CartController implements ControllerInterface{
    public static function Index($data = null)
    {
        View::IncludeMainPage('cart');
    }
}