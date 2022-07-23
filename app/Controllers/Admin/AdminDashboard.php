<?php


namespace App\Controllers\Admin;


use App\Classes\View;
use App\models\Product;
use App\models\User;
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
        $user = new Product();
        $data = $user->All();
        View::IncludeAdminPage('listproduct',$data);
    }
}