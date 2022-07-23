<?php


namespace App\Controllers\Admin;


use App\Classes\View;
use App\models\Product;
use App\models\User;
use App\Models\UserTypes;
use Resource\ControllerInterface;

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
}