<?php
namespace App\Controllers;
use App\Classes\Authentication;
use App\Classes\Header;
use App\Classes\View;
use App\models\User;
use Resource\ControllerInterface;
class LoginController implements ControllerInterface{
    public static function Index($data = null)
    {
        if(Authentication::Logedin()){
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            View::IncludeMainPage('login');
        }
    }
    public static function form(){

        $user = new User($_POST['email']);
        if ($user->IsExist() && $user->password === $_POST['password']){
            $_SESSION['id'] = $user->id;
            $_SESSION['email'] = $user->email;
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else {
            View::IncludeMainPage('login');
        }
    }
    public static function Logout(){
        session_unset();
        Header::redirectTo('http://localhost/ElectronicShop/');
    }
    public static function Session(){
        echo "<pre>";
        var_dump(
            $_SESSION
        );
        echo "</pre>";
    }
}