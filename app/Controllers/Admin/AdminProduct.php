<?php


namespace App\Controllers\Admin;


use App\Classes\Authentication;
use App\Classes\Header;
use App\Classes\Random;
use App\Classes\View;
use App\models\Product;

class AdminProduct
{
    public static function ShowAddProduct(){
        View::IncludeAdminPage("addproduct");
    }
    public static function AddProduct(){
        if (Authentication::Admin()) {
            $product = new Product();
            $product->title = $_POST['ProductTitle'];
            $product->price = $_POST['ProductPrice'];
            $product->categoryId = $_POST['ProductCategory'];
            $target_dir = "C:\\xampp\htdocs\ElectronicShop\public\img\\";
            while (true) {
                $filename = Random::GenerateNumber(4);
                $target_file = $target_dir . $filename . ".jpg";
                if (!file_exists($target_file)) {
                    break;
                }
            }
            echo $target_file;
            move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);
            $target_file = "http://localhost/ElectronicShop/public/img/" . $filename . ".jpg";
            $product->ImgSrc = $target_file;
            $product->Add();
            Header::redirectTo("http://localhost/ElectronicShop/admin/listproduct");
        }
    }
    public static function DeleteProduct($id){
        if (Authentication::Admin()) {
            $product = new Product($id);
            $parts = explode("/", $product->imgSrc);
            $target_file = $parts[count($parts) - 1];
            $target_dir = "C:\\xampp\htdocs\ElectronicShop\public\img\\";
            $target_file = $target_dir . $target_file;
            unlink($target_file);
            $product->Update(['isDelete' => 1]);
            Header::redirectTo("http://localhost/ElectronicShop/admin/listproduct");
        }
    }
    public static function ShowEditProduct($id){
        if (Authentication::Admin()) {
            $product = new Product($id);
            View::IncludeAdminPage("editproduct", $product);
        }
    }
    public static function EditProduct($id){
        if (Authentication::Admin()) {
            $product = new Product($id);
            $product->Update(
                [
                    'title' => $_POST['ProductTitle'],
                    'price' => $_POST['ProductPrice'],
                    'categoryId' => $_POST['ProductCategory'],
                    'qty' => $_POST['ProductQuantity'],
                ]
            );
            if ($_FILES['ProductImage']['name'] != '') {
                $parts = explode("/", $product->imgSrc);
                $target_file = $parts[count($parts) - 1];
                $target_dir = "C:\\xampp\htdocs\ElectronicShop\public\img\\";
                $target_file = $target_dir . $target_file;
                unlink($target_file);
                move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);
            }
            Header::redirectTo("http://localhost/ElectronicShop/admin/listproduct");
        }
    }
    public static function showdiscount($id){
        if (Authentication::Admin()) {
            $product = new Product($id);
            View::IncludeAdminPage('discoutnproduct',['products','listproduct'], $product);
        }
    }
    public static function Discount($id){
        if (Authentication::Admin()) {
            $product = new Product($id);
            $product->Update(
                ['discount' => $_POST['discount']]
            );
            Header::redirectTo("http://localhost/ElectronicShop/admin/listproduct");
        }
    }
}