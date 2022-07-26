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
            $result = $cart->AllBy(['UserId'=>$_SESSION['id']]);
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
    public static function AddCart($productId){
        if ($productId === 'null'){
            return ;
        }
        if(Authentication::Logedin()){
            $cart = new Cart();
            $result = $cart->findBy(
                ['ProductId'=>$productId,'UserId'=>$_SESSION['id']]
            );
            if (count($result) > 0){

            }else{
                $cart->ProductId = $productId;
                $cart->UserId = $_SESSION['id'];
                $cart->qty = 1;
                $cart->Add();
            }
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
}