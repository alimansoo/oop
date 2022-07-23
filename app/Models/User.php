<?php
namespace App\models;
use Resource\Model;
class User extends Model{
    public static function sayhi(){
        echo "hihi";
    }
    public static function data($data){
        var_dump($data);
    }
}