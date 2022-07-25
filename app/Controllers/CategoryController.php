<?php
namespace App\Controllers;
use App\Classes\View;
use App\models\Product;
use Resource\ControllerInterface;
use App\Classes\Header;
use App\Classes\Authentication;
use App\Models\Category;

class CategoryController implements ControllerInterface{
    public static function Index($data = null)
    {
        $category = new Category();
        $result = $category->All();
        View::IncludeMainPage('category',$result);
    }
}