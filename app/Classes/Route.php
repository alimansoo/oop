<?php
namespace App\Classes;
use App\Controllers\Exeptions;
class Route
{
    private static $routs = [];
//    private static $data = [];
    static public function get(string $path,$class,$method){
        self::$routs[] =
        [
            'Requestmethod'=>'GET',
            'url'=>$path,
            'class'=>$class,
            'method'=>$method
        ];
    }
    static public function post(string $path,$class,$method){
        self::$routs[] =
        [
            'Requestmethod'=>'POST',
            'url'=>$path,
            'class'=>$class,
            'method'=>$method
        ];
    }
    static public function go($router){
        $method = $_SERVER['REQUEST_METHOD'];
        foreach (self::$routs as $key => $value) {
            $url = $value['url'];
            if (preg_match("/\{[a-z]*\}/",$url)) {
                $beginIndex = 0;
                $endIndex = 0;
                $regex = $url;
                $keyD = '';
                $valueD = '';
                // for ($i=0; $i < preg_match_all("/\{[a-z]*\}/",$url); $i++) { 
                    $beginIndex = strpos($url,'{',$endIndex);
                    $endIndex = strpos($url,'}',$beginIndex);
                    $subdata = substr($url,$beginIndex,($endIndex-$beginIndex)+2);
                    $regex = str_replace($subdata,'[a-z0-9]*',$regex);
                // }
                $regex = $regex;
                $regex = "/".str_replace('/','\/',$regex)."/";
                if (preg_match($regex,$router) && $method=== $value['Requestmethod']) {
                    $keyD = str_replace("{","",$subdata);
                    $keyD = str_replace("}","",$keyD);
                    $valueD = substr($router." ",$beginIndex,$endIndex-strlen($url));
//                    self::$data[$keyD] = $valueD;
                    $class = $value['class'];
                    $fun = $value['method'];
                    $class::$fun($valueD);
                    return;
                }
            }else if($value['url'] === $router  && $method=== $value['Requestmethod']) {
                $class = $value['class'];
                $fun = $value['method'];
                $class::$fun();
                return;
            }
        }
        Exeptions::notfound();
        return;
    }
    static function redirect_to($path){
        if (is_null($path)) {
            return;
        }
        header("Location:$path");
    }
    static function redirect_to_url($path)
    {
        Rout::redirect_to(
            Rout::full_url($path)
        );
    }
    static function url($path = null)
    {
        if (!isset(PAGE_URLS[$path])) {
            return;
        }
        if (is_null($path)) {
            return PAGE_URLS['home']['url'];
        }
        return PAGE_URLS[$path]['url'];
    }
    static function full_url($path = null)
    {
        if (!isset(PAGE_URLS[$path])) {
            return;
        }
        if (is_null($path)) {
            return SITE_URL.PAGE_URLS['home']['url'];
        }
        return SITE_URL.PAGE_URLS[$path]['url'];
    }
}
