<?php


namespace App\Classes;


class Filter
{
    public static function String($key){
        if (isset($_GET[$key]) && $_GET[$key]!== ''){
            echo $_GET[$key];
        }
    }
    public static function Checkbox($key){
        if (isset($_GET[$key])){
            echo 'checked';
        }
    }
    public static function RadioBtn($key,$value){
        if (isset($_GET[$key]) && $_GET[$key]===$value){
            echo 'checked';
        }
    }
    public static function Combobox($key,$value){
        if (isset($_GET[$key]) && $_GET[$key]===$value){
            echo 'selected';
        }
    }
}