<?php
namespace App\Controllers;
use App\Classes\Errore;
use App\Classes\Header;
use App\Classes\View;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\models\Product;
use App\models\User;
use Resource\ControllerInterface;

class OrderController implements ControllerInterface{
    public static function Index($data = null)
    {
        View::IncludeMainPage("order");
    }
    public static function Save($data = null)
    {
        if (strlen($_POST['reciverName'])<=0) {
            Errore::danger('نام گیرنده سفارش را وارد کنید.');
            Header::redirectTo('http://localhost/ElectronicShop/order');
            return;
        }if (strlen($_POST['Address'])<=0) {
            Errore::danger('آدرس سفارش را وارد کنید.');
            Header::redirectTo('http://localhost/ElectronicShop/order');
            return;
        }
        $maxBuy = [
            1=>0,
            2=>0,
            3=>5000000,
            4=>30000000,
        ];
        $user = new User($_SESSION['email']);
        $cart = new Cart();
        $cartItems = $cart->AllBy(['UserId'=>$_SESSION['id']]);
        if (count($cartItems)<1){
            Errore::danger('شما در سبد هیچ نداری.');
            Header::redirectTo('http://localhost/ElectronicShop/order');
            return;
        }
        $totalPrice = 0;
        foreach ($cartItems as $cartItem){
            $cart = new Cart($cartItem['id']);
            $product = new Product($cart->ProductId);
            $totalPrice += $product->price;
        }
        if ($maxBuy[$user->verifStatus] < $totalPrice){
            Errore::danger('سفارش شما بیشتر از حد مجاز است.');
            Header::redirectTo('http://localhost/ElectronicShop/order');
            return;
        }

        $order = new Order();
        $order->reciverName = $_POST['reciverName'];
        $datetime = new \DateTime();
        $datetime->modify('+'.$_POST['resiverDate'].' day');
        $order->reciverDate = $datetime->format('Y-m-d');;
        $order->savedDate = date('Y-m-d');
        $order->Address = $_POST['Address'];
        $order->transportPrice = "30000";
        $order->status = 0;
        $order->IsPayed = 0;
        $order->UserId = $user->id;
        $orderId = $order->Add();
        $cart = new Cart();
        $cartItems = $cart->AllBy(['UserId'=>$_SESSION['id']]);
        $totalPrice = 0;
        foreach ($cartItems as $cartItem){
            $cart = new Cart($cartItem['id']);
            $orderitem = new OrderItem();
            $product = new Product($cart->ProductId);
            $totalPrice += $product->price;
            $orderitem->OrderId = $orderId;
            $orderitem->ProductId = $cart->ProductId;
            $orderitem->qty = $cart->qty;
            $orderitem->Add();
            $cart->Delete();
            $product->Update(
                [
                    'qty'=>($product->qty-$cart->qty)
                ]
            );
        }
        $order = new Order($orderId);
        $order->Update(
            ['TotalPrice'=>$totalPrice]
        );
        Header::redirectTo("http://localhost/ElectronicShop/payment");
        $_SESSION['orderId'] = $orderId;
    }
    public static function Payment(){
        View::IncludeMainPage("payment");
    }
    public static function paymentOrder(){
        $order = new Order($_SESSION['orderId']);
        $order->Update(['IsPayed'=>1]);
        Errore::success('سفارش شما ثبت شد.');
        Header::redirectTo("http://localhost/ElectronicShop/message");
    }
}