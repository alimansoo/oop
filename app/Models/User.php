<?php
namespace App\models;
use Resource\Model;
class User extends Model{
    protected $TBNAME = 'users';
    protected $PrimaryKey = 'email';
    public function FullName(){
        return $this->fname.' '.$this->lname;
    }
}