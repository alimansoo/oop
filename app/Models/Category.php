<?php


namespace App\Models;


use Resource\Model;

class Category extends Model
{
    public $TBNAME = 'categories';
    protected $PrimaryKey = 'name';
}