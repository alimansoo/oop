<?php
namespace App\Controllers;
use App\Classes\Errore;
use App\Classes\View;
use App\models\Product;
use App\models\User;
use Resource\ControllerInterface;
use App\Classes\Header;
use App\Classes\Authentication;
use App\Models\Cart;

class CartController implements ControllerInterface{
    public static function Index($data = null)
    {
        if(Authentication::Logedin()){
            $user = new User($_SESSION['email']);
            $cart = new Cart();
            $result = $cart->AllBy(['UserId'=>$user->id]);
            $products = [];
            foreach ($result as $value){
                $product = new Product($value['ProductId']);
                $product->orderid = $value['id'];
                if ($value['qty']>$product->qty){
                    $product->cartqty = $product->qty;
                    $productcart = new Cart($value['id']);
                    $productcart->Update(
                        ['qty'=>$product->qty]
                    );
                }else{
                    $product->cartqty = $value['qty'];
                }

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
            if (count($result) < 0){
                Header::redirectTo('http://localhost/ElectronicShop/product/'.$productId);
                return;
            }else{
                $product = new Product($productId);
                if ($product->qty<=0){
                    Errore::danger('موجودی ناکافی!');
                    Header::redirectTo('http://localhost/ElectronicShop/cart');
                    return;
                }
                $user = new User($_SESSION['email']);
                $cart->ProductId = $productId;
                $cart->UserId = $user->id;
                $cart->qty = 1;
                $cart->Add();
            }
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
    public static function DeleteCart($Id){
        if ($Id === 'null'){
            return ;
        }
        if(Authentication::Logedin()){
            $cart = new Cart();
            $result = $cart->findBy(
                ['id'=>$Id]
            );
            if (count($result) < 0){
                return;
            }else{
                $cart = new Cart($result['id']);
                $cart->Delete();
            }
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
    public static function DecreaceCart($Id){
        if ($Id === 'null'){
            return ;
        }
        if(Authentication::Logedin()){
            $cart = new Cart();
            $result = $cart->findBy(
                ['id'=>$Id]
            );
            if (count($result) < 0){
                return;
            }else{
                $cart = new Cart($result['id']);
                if ($cart->qty <=1 ){
                    $cart->Delete();
                    Header::redirectTo('http://localhost/ElectronicShop/cart');
                    return;
                }
                $cart->Update(
                    [
                        'qty'=>$cart->qty-1
                    ]
                );
            }
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
    public static function IncreaseCart($Id){
        if ($Id === 'null'){
            return ;
        }
        if(Authentication::Logedin()){
            $cart = new Cart();
            $result = $cart->findBy(
                ['id'=>$Id]
            );
            if (count($result) < 0){
                return;
            }else{
                $cart = new Cart($result['id']);
                $product = new Product($cart->ProductId);
                $cart->qty++;
                if ($product->qty<$cart->qty){
                    Errore::danger('موجودی محصول ناکافی.');
                    Header::redirectTo('http://localhost/ElectronicShop/cart');
                    return;
                }
                $cart->Update(
                    [
                        'qty'=>$cart->qty
                    ]
                );
            }
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
}