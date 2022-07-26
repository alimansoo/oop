<?php
namespace App\Controllers;
use App\Classes\db;
use App\Classes\View;
use Resource\ControllerInterface;
class UserController implements ControllerInterface
{
     public static function Index($data = null)
     {
         View::IncludeMainPage("register");
     }
     public static function Dashboard(){
//         $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
//         $cdb->query("INSERT INTO `cards`(`ProductId`, `UserId`, `qty`) VALUES ('value2','457896','3')");
         View::IncludeMainPage("userpanel");
     }
}