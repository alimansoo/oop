<?php
namespace App\Controllers;
use App\Classes\View;
use App\models\Product;
use Resource\ControllerInterface;
use App\Classes\Header;
use App\Classes\Authentication;
use App\Models\Cart;

class CartController implements ControllerInterface{
    public static function Index($data = null)
    {
        if(Authentication::Logedin()){
            $cart = new Cart();
            $result = $cart->AllBy(['UserId'=>$_SESSION['email']]);
            $products = [];
            foreach ($result as $value){
                $product = new Product($value['ProductId']);
                $product->qty = $value['qty'];
                $products[] = $product;
            }
            View::IncludeMainPage('cart',$products);
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }

    }
}