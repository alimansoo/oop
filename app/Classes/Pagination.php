<?php


namespace App\Classes;


class Pagination
{
    public static function FooterPaginate($dataCount){
        for ($i=1;$i<$dataCount['pageNumber']+1;$i++){
            echo '<a href="?page='.$i;
            foreach ($_GET as $key=>$value){
                if ($key === 'page')
                    continue;
                echo "&{$key}={$value}";
            }
            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            echo '" class="btn ';
            if ($page == $i)
                echo 'btn-dark';
            else
                echo 'btn-primary';
            echo ' m-2">'.$i.'</a>';
        }
    }
    public static function Paginate($model,$pageLimit,$filter=[]){
        if (isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }else{
            $page = 1;
        }
        $startIndex = ($page-1)*$pageLimit;
        $limit = [$pageLimit,$startIndex];
        if ($filter===[]){
            $dataCount = $model->count();
            $data = $model->All($limit);
        }else{
            $dataCount = $model->count($filter);
            $data = $model->AllBy($filter,$limit);
        }
        $data['pageNumber'] = ceil($dataCount/$pageLimit);
        return $data;
    }
}