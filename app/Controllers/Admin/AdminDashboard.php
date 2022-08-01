<?php
namespace App\Controllers\Admin;

use App\Classes\Authentication;
use App\Classes\View;
use App\Models\Order;
use App\models\Product;
use App\models\User;
use App\Models\UserTypes;
use Resource\ControllerInterface;
use App\Models\Category;
use App\Classes\Pagination;

class AdminDashboard implements ControllerInterface
{
    public static function Index($data = null)
    {
        if (Authentication::Admin()){
            View::IncludeAdminPage('dashboard',['dashboard']);
        }
    }
    public static function ListUser($data = null)
    {
        if (Authentication::Admin()){
            $user = new User();

            $filter = [];
            if (isset($_GET['id']) && $_GET['id']!== ''){
                $filter['id'] = ['=',$_GET['id']];
            }
            if (isset($_GET['fname']) && $_GET['fname']!== ''){
                $filter['fname'] = ['LIKE','%'.$_GET['fname'].'%'];
            }
            if (isset($_GET['lname']) && $_GET['lname']!== ''){
                $filter['lname'] = ['LIKE','%'.$_GET['lname'].'%'];
            }
            if (isset($_GET['email']) && $_GET['email']!== ''){
                $filter['email'] = ['=',$_GET['email']];
            }
            if (isset($_GET['phone']) && $_GET['phone']!== ''){
                $filter['phone'] = ['=',$_GET['phone']];
            }
            if (isset($_GET['active']) && $_GET['active']==='on'){
                $filter['isActive'] = ['=',1];
            }
            if (isset($_GET['active']) && $_GET['active']==='off'){
                $filter['isActive'] = ['=',0];
            }
            $data = Pagination::Paginate($user,10,$filter);
            View::IncludeAdminPage('listuser',['users','listusers'],$data);
        }
    }
    public static function ListProduct($data = null)
    {
        if (Authentication::Admin()) {
            $product = new Product();

            $filter = [];
            if (isset($_GET['id']) && $_GET['id']!== ''){
                $filter['id'] = ['=',$_GET['id']];
            }
            if (isset($_GET['name']) && $_GET['name']!== ''){
                $filter['title'] = ['LIKE','%'.$_GET['name'].'%'];
            }
            if (isset($_GET['ofPrice']) && $_GET['ofPrice']!== ''){
                $filter['price'][0] = ['>=',$_GET['ofPrice']];
            }
            if (isset($_GET['toPrice']) && $_GET['toPrice']!== ''){
                $filter['price'][1] = ['<=',$_GET['toPrice']];
            }
            if (isset($_GET['discount'])){
                $filter['discount'] = ['>',0];
            }
            $data = Pagination::Paginate($product,10,$filter);
            View::IncludeAdminPage('listproduct',['products','listprouducts'], $data);
        }
    }
    public static function ListUserTypes($data = null)
    {
        if (Authentication::Admin()) {
            $usertype = new UserTypes();
            $data = $usertype->All();
            View::IncludeAdminPage('listusertype',['users','typesusers'], $data);
        }
    }
    public static function ListCatgory($data = null)
    {
        if (Authentication::Admin()) {
            $category = new Category();
            $filter = [];
            if (isset($_GET['id']) && $_GET['id']!== ''){
                $filter['id'] = ['=',$_GET['id']];
            }
            if (isset($_GET['name']) && $_GET['name']!== ''){
                $filter['Name'] = ['LIKE','%'.$_GET['name'].'%'];
            }
            if (isset($_GET['persianName']) && $_GET['persianName']!== ''){
                $filter['persianName'][0] = ['LIKE','%'.$_GET['persianName'].'%'];
            }
            $data = Pagination::Paginate($category,10,$filter);
            View::IncludeAdminPage('listcategory',['products','categorys'], $data);
        }
    }
    public static function ListOrders($data = null)
    {
        if (Authentication::Admin()) {
            $order = new Order();

            $filter = [];
            if (isset($_GET['id']) && $_GET['id']!== ''){
                $filter['id'] = ['=',$_GET['id']];
            }
            if (isset($_GET['status']) && $_GET['status']!== ''){
                $filter['status'] = ['=',$_GET['status']];
            }
            if (isset($_GET['savedDateof']) && $_GET['savedDateof']!== ''){
                $filter['savedDate'][0] = ['>=',$_GET['savedDateof']];
            }
            if (isset($_GET['savedDateto']) && $_GET['savedDateto']!== ''){
                $filter['savedDate'][1] = ['<=',$_GET['savedDateto']];
            }
            if (isset($_GET['reciverDateof']) && $_GET['reciverDateof']!== ''){
                $filter['reciverDate'][0] = ['>=',$_GET['reciverDateof']];
            }
            if (isset($_GET['reciverDateto']) && $_GET['reciverDateto']!== ''){
                $filter['reciverDate'][1] = ['<=',$_GET['reciverDateto']];
            }
            if (isset($_GET['ispayed']) && $_GET['ispayed']==='on'){
                $filter['IsPayed'] = ['=',1];
            }
            if (isset($_GET['ispayed']) && $_GET['ispayed']==='off'){
                $filter['IsPayed'] = ['=',0];
            }
            $data = Pagination::Paginate($order,10,$filter);
            View::IncludeAdminPage('listorders',['orders','listorders'], $data);
        }
    }
}