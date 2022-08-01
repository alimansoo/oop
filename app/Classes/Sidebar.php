<?php


namespace App\Classes;


class Sidebar
{
    public static function GroupList($sidebar,$value){
        if ($sidebar[0] === $value)
            echo 'menu-open';
    }
    public static function GroupTitle($sidebar,$value){
        if ($sidebar[0] === $value)
            echo 'active';
    }
    public static function GroupItem($sidebar,$value){
        if ($sidebar[1] === $value)
            echo 'active';
    }
}