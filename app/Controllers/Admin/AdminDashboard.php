<?php


namespace App\Controllers\Admin;


use App\Classes\View;
use App\Models\Order;
use App\models\Product;
use App\models\User;
use App\Models\UserTypes;
use Resource\ControllerInterface;
use App\Models\Category;

class AdminDashboard implements ControllerInterface
{
    public static function Index($data = null)
    {
        View::IncludeAdminPage('dashboard');

    }
    public static function ListUser($data = null)
    {
        $user = new User();
        $data = $user->All();
        View::IncludeAdminPage('listuser',$data);
    }
    public static function ListProduct($data = null)
    {
        $product = new Product();
        $data = $product->All();
        View::IncludeAdminPage('listproduct',$data);
    }
    public static function ListUserTypes($data = null)
    {
        $usertype = new UserTypes();
        $data = $usertype->All();
        View::IncludeAdminPage('listusertype',$data);
    }
    public static function ListCatgory($data = null)
    {
        $usertype = new Category();
        $data = $usertype->All();
        View::IncludeAdminPage('listcategory',$data);
    }
    public static function ListOrders($data = null)
    {
        $usertype = new Order();
        $data = $usertype->All();
        View::IncludeAdminPage('listorders',$data);
    }
}