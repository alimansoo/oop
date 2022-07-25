<?php
namespace App\Controllers;
use App\Classes\View;
use Resource\ControllerInterface;
class UserController implements ControllerInterface
{
     public static function Index($data = null)
     {
//         echo "omadam";
         View::IncludeMainPage("register");
     }
     public static function Dashboard(){
         View::IncludeMainPage("userpanel");
     }
}