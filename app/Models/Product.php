<?php

namespace App\models;

use Resource\Model;

class Product extends Model{
    public $TBNAME = 'products';
    protected $PrimaryKey = 'id';
}