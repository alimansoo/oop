<?php
use App\Classes\Route;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\ProductController;
use App\Controllers\RegisterController;
use App\Controllers\CartController;
use App\Controllers\UserController;
use App\Controllers\Admin\AdminDashboard;
use App\Controllers\Admin\AdminProduct;
use App\Controllers\CategoryController;
use App\Controllers\OrderController;

$request = $_SERVER['REQUEST_URI'];
$request = str_replace(BASE_URL,'',$request);
$datapos = strpos($request,'?');
if ($datapos) {
    $router = substr($request,0,$datapos);
} else {
    $router = substr($request,0);
}

Route::get('',IndexController::class,'Index');
Route::get('login',LoginController::class,'Index');
Route::get('logout',LoginController::class,'Logout');
Route::get('session',LoginController::class,'Session');
Route::post('login',LoginController::class,'form');
Route::get('register',RegisterController::class,'Index');
Route::post('register',RegisterController::class,'Register');
Route::get('category',CategoryController::class,'Index');
Route::get('search',ProductController::class,'Filter');
Route::post('admin/editproduct/{id}',AdminProduct::class,'EditProduct');
Route::get('admin/editproduct/{id}',AdminProduct::class,'ShowEditProduct');
Route::get('admin/delproduct/{id}',AdminProduct::class,'DeleteProduct');
Route::get('cart/{productid}',CartController::class,'AddCart');
Route::get('product/{id}',ProductController::class,'Index');
Route::get('cart',CartController::class,'Index');
Route::get('userpanel',UserController::class,'Dashboard');
Route::get('order',OrderController::class,'Index');
Route::post('order',OrderController::class,'Save');
Route::get('payment',OrderController::class,'Payment');
Route::post('payment',OrderController::class,'paymentOrder');
Route::get('message',IndexController::class,'Message');

//Admin

Route::get('admin',AdminDashboard::class,'Index');
Route::get('admin/listuser',AdminDashboard::class,'ListUser');
Route::get('admin/listproduct',AdminDashboard::class,'ListProduct');
Route::get('admin/addproduct',AdminProduct::class,'ShowAddProduct');
Route::post('admin/addproduct',AdminProduct::class,'AddProduct');
Route::get('admin/listtypes',AdminDashboard::class,'ListUserTypes');
Route::get('admin/listcatgory',AdminDashboard::class,'ListCatgory');
Route::get('admin/listorders',AdminDashboard::class,'ListOrders');


Route::go($router);