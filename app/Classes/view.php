<?php
namespace App\Classes;
class View
{
    static function IncludeMainPage($view)
    {
        include 'C:\xampp\htdocs\ElectronicShop\public\views\Page\MainPage.php';
    }
    static function IncludeForThis()
    {
        $filename = getFilename(
            basename(
                debug_backtrace()[0]['file'] 
            )
        );
        if (function_exists('adminPanel') and adminPanel()) {
            include ADMIN_VIEW_PATH.$filename.'_view.php';
        } else {
            include VIEW_PATH.$filename.'_view.php';
        }
    }
    static function Include($filename)
    {
        include VIEW_PATH.$filename.'_view.php';
    }
    static function IsView($filename){
        $fileArray = explode('_',$filename);
        if (isset($fileArray[1]) and  $fileArray[1] === 'view.php') {
            return true;
        }
        return false;
    }
}