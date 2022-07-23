<?php
use App\Classes\Route;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\ProductController;
use App\Controllers\RegisterController;
use App\Controllers\CartController;
use App\Controllers\UserPanelController;
use App\Controllers\Admin\AdminDashboard;

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
Route::post('login',LoginController::class,'form');
Route::get('register',RegisterController::class,'Index');
Route::post('register',RegisterController::class,'Register');
Route::get('cart',CartController::class,'Index');
Route::get('userpanel',UserPanelController::class,'Index');
Route::get('admin',AdminDashboard::class,'Index');
Route::get('admin/listuser',AdminDashboard::class,'ListUser');
Route::get('admin/listproduct',AdminDashboard::class,'ListProduct');

Route::go($router);