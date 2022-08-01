<?php


namespace App\Controllers\Admin;


use App\Classes\Authentication;
use App\Classes\Header;
use App\Classes\Random;
use App\Classes\View;
use App\Models\Order;
use App\models\Product;
use App\models\User;

class AdminOrder
{
    public static function showChangeStatus($id){
        $order = new Order($id);
        View::IncludeAdminPage('changeorderstatus',['orders','list'],$order);
    }
    public static function ChangeStatus($id){
        $order = new Order($id);
        $order->Update(
            ['status'=>$_POST['OrderStatus']]
        );
        Header::redirectTo('http://localhost/ElectronicShop/admin/listorders');
    }
}