<?php

class Athuntication
{
    static function loginUser($array)
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    static function isUser()
    {
        if (isset($_SESSION['id'])) {
            return true;
        }
        return false;
    }
    static function Userid()
    {
        return $_SESSION['id'];
    }
    static function logoutUser()
    {
        session_unset();
        session_status();
    }
}
