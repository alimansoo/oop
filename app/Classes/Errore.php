<?php


namespace App\Classes;


class Errore
{
    static function ShowErrore(){
        if (isset($_SESSION['Messages']) && count($_SESSION['Messages'])>0)
            foreach ($_SESSION['Messages'] as $message){
            $class = 'alert ';
            switch ($message['type']){
                case 'success':
                    $class .= "alert-success";
                    break;
                case 'danger':
                    $class .= "alert-danger";
                    break;
                case 'warning':
                    $class .= "alert-warning";
                    break;
            }
            echo "<div class='$class'>{$message['msg']}</div>";
        }
        $_SESSION['Messages'] = [];
    }
    static function success($message){
        $_SESSION['Messages'][] = [
            'type'=>'success',
            'msg'=>$message
        ];
    }
    static function danger($message){
        $_SESSION['Messages'][] = [
            'type'=>'danger',
            'msg'=>$message
        ];
    }
    static function warning($message){
        $_SESSION['Messages'][] = [
            'type'=>'warning',
            'msg'=>$message
        ];
    }
}