<?php
namespace App\Classes;
class View
{
    static function IncludeMainPage($view)
    {
        include 'C:\xampp\htdocs\ElectronicShop\public\views\Page\MainPage.php';
    }
    static function IncludeUserPage($view)
    {
        include 'C:\xampp\htdocs\ElectronicShop\public\views\userpanel_view.php';
    }
    static function IncludeAdminPage($view,$data=null)
    {
        include 'C:\xampp\htdocs\ElectronicShop\public\views\Page\AdminPage.php';
    }
}