<?php
namespace App\Controllers;
use App\Classes\Authentication;
use App\Classes\Header;
use App\Classes\View;
use App\models\User;
use Resource\ControllerInterface;
use App\Classes\Errore;
class LoginController implements ControllerInterface{
    public static function Index($data = null)
    {
        if(Authentication::Logedin()){
            Header::redirectTo('http://localhost/ElectronicShop/cart');
        }else{
            View::IncludeMainPage('login');
        }
    }
    public static function form(){
        $user = new User($_POST['email']);
        if ($user->IsExist() && $user->password === $_POST['password']){
            if ($user->verifStatus === 0){
                Errore::danger('شما هنوز اهراز هویت با ایمیل را انجام نداده اید.');
                Header::redirectTo('http://localhost/ElectronicShop/login');
                return;
            }else if ($user->verifStatus === 1){
                Errore::danger('شما هنوز احراز هویت مرحله دو را انجام نداده اید.<a href="http://localhost/ElectronicShop/veriflevel2">انجام احراز هویت</a>');
                Header::redirectTo('http://localhost/ElectronicShop/login');
                return;
            }else if ($user->verifStatus === 2 && $user->rejected === 0){
                Errore::danger('هنوز پاسخی از ادمین دریافت نشده است.');
                Header::redirectTo('http://localhost/ElectronicShop/login');
                return;
            }else if ($user->verifStatus === 2 && $user->rejected === 1){
                $_SESSION['emailverif'] = $user->email;
                $text = 'کاربر گرامی شما به دلیل '.$user->rejectedMessage.'. ریپورت شده اید'.'<a href="http://localhost/ElectronicShop/veriflevel2">انجام  مجدد احراز هویت</a>';
                Errore::warning($text);
                Header::redirectTo('http://localhost/ElectronicShop/message');
                return;
            }else if ($user->isActive === 0){
                Errore::warning('کاربر شما غیر فعال هستید.');
                Header::redirectTo('http://localhost/ElectronicShop/login');
                return;
            }else if($user->verifStatus>=3 && $user->rejected == 0 && $user->isActive == 1){
                $_SESSION['email'] = $user->email;
                if ($user->usertypeId === 1)
                    Header::redirectTo('http://localhost/ElectronicShop/admin');
                elseif ($user->usertypeId === 3)
                    Header::redirectTo('http://localhost/ElectronicShop/userpanel');
            }
        }else{
            Errore::danger('ایمیل و رمز شما مغایرت ندارد.');
            Header::redirectTo('http://localhost/ElectronicShop/login');
        }
    }
    public static function Logout(){
        session_unset();
        Header::redirectTo('http://localhost/ElectronicShop/');
    }
    public static function Session(){
        echo "<pre>";
        var_dump(
            $_SESSION
        );
        echo "</pre>";
    }
}