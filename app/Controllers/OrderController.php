<?php
namespace App\Controllers;
use App\Classes\Header;
use App\Classes\View;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\models\Product;
use Resource\ControllerInterface;


class OrderController implements ControllerInterface{
    public static function Index($data = null)
    {
        View::IncludeMainPage("order");
    }
    public static function Save($data = null)
    {
        $order = new Order();
        $order->reciverName = $_POST['reciverName'];
        $datetime = new \DateTime();
        $datetime->modify('+'.$_POST['resiverDate'].' day');
        $order->reciverDate = $datetime->format('Y-m-d');;
        $order->savedDate = date('Y-m-d');
        $order->AdressId = $_POST['Address'];
        $order->transportPrice = "30000";
        $order->status = 0;
        $order->IsPayed = 0;
        $order->UserId = $_SESSION['id'];
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
        $_SESSION['msg'] = 'سفارش شما با موفقیت ثبت شد';
        Header::redirectTo("http://localhost/ElectronicShop/message");
    }
}