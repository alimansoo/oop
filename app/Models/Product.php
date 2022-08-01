<?php

namespace App\models;

use Resource\Model;

class Product extends Model{
    public $TBNAME = 'products';
    protected $PrimaryKey = 'id';
    public function All($limit=null){
        return parent::AllBy(
            [
                'isDelete'=>0
            ]
            ,$limit
        );
    }
    public function AllBy($where,$limit=null){
        $where['isDelete'] = 0;
        return parent::AllBy($where,$limit);
    }
}