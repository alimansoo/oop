<?php
namespace App\Controllers;
use App\Classes\db;
use App\Classes\View;
use App\models\Product;
use App\Models\Category;
class ProductController{
    public static function Index($product){
        $product = new Product($product);
        View::IncludeMainPage("product",$product);
    }
    public static function Filter(){
        $category = new Category($_GET['category']);

        $product = new Product();
        $result = $product->AllBy(['categoryId'=>$category->id]);
        View::IncludeMainPage("search",$result);
    }
}