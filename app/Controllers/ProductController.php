<?php
namespace App\Controllers;
use App\Classes\View;
use App\models\Product;
class ProductController{
    public static function Index($product){
//        $p = new Product($product);
        View::IncludeMainPage("product");
    }
}