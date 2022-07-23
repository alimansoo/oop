<?php
namespace App\Controllers;
use App\Classes\View;
use Resource\ControllerInterface;
class UserPanelController implements ControllerInterface
{
     public static function Index($data = null)
     {
//         echo "omadam";
         View::IncludeUserPage('d');
     }
}