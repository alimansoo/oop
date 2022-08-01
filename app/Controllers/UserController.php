<?php
namespace App\Controllers;
use App\Classes\View;
use App\models\User;
use Resource\ControllerInterface;
class UserController implements ControllerInterface
{
     public static function Index($data = null)
     {
         View::IncludeMainPage("register");
     }
     public static function Dashboard(){
         $user = new User($_SESSION['email']);
         View::IncludeMainPage("userpanel",$user);
     }
}