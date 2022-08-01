<?php


namespace App\Controllers\Admin;


use App\Classes\Authentication;
use App\Classes\Header;
use App\Classes\Random;
use App\Classes\View;
use App\models\Product;
use App\models\User;

class AdminUser
{
    public static function Verification($email){
        $user = new User($email);
        View::IncludeAdminPage('verifuser',$user);
    }
    public static function SuccessVerification($email){
        if (Authentication::Admin()) {
            $user = new User($email);
            $user->Update(
                [
                    'verifStatus' => 3,
                    'isActive' => 1
                ]
            );
            Header::redirectTo("http://localhost/ElectronicShop/admin/listuser");
        }
    }
    public static function showRejectUser($email){
        if (Authentication::Admin()) {
            $user = new User($email);
            View::IncludeAdminPage('rejectuser', $user);
        }
    }
    public static function rejectUser($email){
        if (Authentication::Admin()) {
            $user = new User($email);
            $rejectedMessage = '';
            switch ($_POST['rejectMessage']) {
                case 1:
                    $rejectedMessage = 'کارت ملی بد بود';
                case 2:
                    $rejectedMessage = 'نام و فامیل غیر متعارف';
            }
            echo $rejectedMessage;
            $user->Update(
                [
                    'rejected' => 1,
                    'rejectedMessage' => $rejectedMessage,
                ]
            );
            Header::redirectTo("http://localhost/ElectronicShop/admin/listuser");
        }
    }
    public static function ActiveUser($email){
        if (Authentication::Admin()) {
            $user = new User($email);
            if ($user->isActive) {
                $user->Update(['IsActive' => 0]);
            } else if ($user->rejected !== 1) {
                $user->Update(['IsActive' => 1]);
            }
            Header::redirectTo("http://localhost/ElectronicShop/admin/listuser");
        }
    }
}