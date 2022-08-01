<?php
namespace App\models;
use Resource\Model;
class User extends Model{
    protected $TBNAME = 'users';
    protected $PrimaryKey = 'email';
    public function FullName(){
        if ($this->fname === 0 && $this->lname===0)
            return $this->email;
        return $this->fname.' '.$this->lname;
    }
}