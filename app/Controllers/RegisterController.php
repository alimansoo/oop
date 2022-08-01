<?php
namespace App\Controllers;
use App\Classes\Authentication;
use App\Classes\Errore;
use App\Classes\Header;
use App\Classes\View;
use App\models\User;
use App\Classes\Email;
use App\Classes\Random;

class RegisterController{
    public static function Index(){
        if (Authentication::Logedin())
            Header::redirectTo("http://localhost/ElectronicShop/userpanel");
        else
            View::IncludeMainPage("register");
    }
    public static function Register(){
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            Errore::danger('ایمیل شما درست نیست.');
            Header::redirectTo('http://localhost/ElectronicShop/register');
            return;
        }
        if (!preg_match('/^[0-9]{11}+$/', $_POST['phone'])){
            Errore::danger('فرمت شماره شما درست نیست.');
            Header::redirectTo('http://localhost/ElectronicShop/register');
            return;
        }
        if (strlen($_POST["password"]) < 5) {
            Errore::danger('رمز باید بیشتر از 6 کاراکتر باشد.');
            Header::redirectTo('http://localhost/ElectronicShop/register');
            return;
        }
        $user = new User($_POST['email']);
        if ($user->IsExist()){
            Errore::danger('کاربری با این ایمیل وجود دارد.');
            Header::redirectTo('http://localhost/ElectronicShop/register');
            return;
        }
        $user->email = $_POST['email'];
        $user->phone = $_POST['phone'];
        $user->password = $_POST['password'];
        $user->usertypeId = 3;
        $user->verifStatus = 0;
        $email = new Email();
        $email->To($user->email);
        $generateCode = 0;
        while (true){
            $generateCode = Random::GenerateNumber(6);
            $userwithcod = $user->findBy(
                ['emailCode'=>$generateCode]
            );
            if (count($userwithcod)<1){
                break;
            }

        }
        $user->emailCode = $generateCode;
        $email->Content("Email Verification Code",
            "Click on the link to verification <a target='_blank' href='http://localhost/ElectronicShop/verification/$generateCode'>Link</a>");
        $email->Send();
        $user->Add();
        Errore::success('کد به ایمیل شما ارسال شد.');
        Header::redirectTo('http://localhost/ElectronicShop/register');
    }
    public static function Verification($code){
        $user = new User();
        $result = $user->findBy(
            ['emailCode '=>$code]
        );

        $user = new User($result['email']);
        $_SESSION['email'] = $user->email;
        $user->Update(['verifStatus'=>1]);
        Header::redirectTo("http://localhost/ElectronicShop/veriflevel2");
    }
    public static function ShowVerificationLevel2(){
        View::IncludeMainPage("verificationLevel2");
    }
    public static function ShowVerificationLevel3(){
        View::IncludeMainPage("verificationLevel3");
    }
    public static function VerificationLevel3(){
        if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/",$_POST['Birthday'])) {
            echo "birthday";
            Errore::danger('تاریخ تولد شما درست نیست!');
            Header::redirectTo('http://localhost/ElectronicShop/veriflevel3');
            return;
        }
        $user = new User($_SESSION['email']);
        $user->Update(
            [
                'Birthday'=>$_POST['Birthday'],
                'verifStatus'=>4,
            ]
        );
        Header::redirectTo('http://localhost/ElectronicShop/userpanel');
    }
    public static function VerificationLevel2(){
        if (strlen($_POST['firstName'])<=0) {
            Errore::danger('نام را وارد کنید.');
            Header::redirectTo('http://localhost/ElectronicShop/veriflevel2');
            return;
        }if (strlen($_POST['lastName'])<=0) {
            Errore::danger('نام خوانوادگی را وارد کنید.');
            Header::redirectTo('http://localhost/ElectronicShop/veriflevel2');
            return;
        }if (strlen($_FILES['NationalCartImg']['name'])<=0) {
            Errore::danger('عکسی انتخاب نشده است.');
            Header::redirectTo('http://localhost/ElectronicShop/veriflevel2');
            return;
        }
        $user = new User($_SESSION['email']);
        $user->Update(
            [
                'fname'=>$_POST['firstName'],
                'lname'=>$_POST['lastName'],
                'verifStatus'=>2,
                'nationalCartIMG'=>$_FILES['NationalCartImg']['name'],
                'rejected'=>0,
                'rejectedMessage'=>null
            ]
        );
        if ($user->nationalCartIMG !== ''){
            unlink("C:\\xampp\htdocs\ElectronicShop\public\img\\nationalcards\\".$user->nationalCartIMG);
        }
        $target_dir = "C:\\xampp\htdocs\ElectronicShop\public\img\\nationalcards\\";
        $target_file = $target_dir.$_FILES['NationalCartImg']['name'];
        move_uploaded_file($_FILES["NationalCartImg"]["tmp_name"], $target_file);
        $_SESSION['redirectTo'] = false;
        Errore::success('اطلاعات شما به ادمین ارسال و منتظر پاسخ می باشد.');
        Header::redirectTo('http://localhost/ElectronicShop/login');
    }
}