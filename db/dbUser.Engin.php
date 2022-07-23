<?php
class DBUserEngin extends DBEngine
{
    public $TABLE_NAME = 'user';
    public function getAllofThem()
    {
        $result = $this->GetAllFildes(
            null,
            null,
            null,
            true
        );
        if (count($result) < 0) {
            return false;
        }
        return $result;
    }
    public function getBy_username_password($username,$password) {
        $result = $this->GetAllFildes(
            array(
                'email'=>$username,
                'password'=>$password
            )
        );
        if (count($result) < 0) {
            return false;
        }
        return $result;
    }
    public function getBy_id($id) {
        $result = $this->GetAllFildes(
            array(
                'id'=>$id
            )
        );
        if (count($result) < 0) {
            return false;
        }
        return $result;
    }
    public function getBy_email($email) {
        $result = $this->GetAllFildes(
            array(
                'email'=>$email
            )
        );
        if (count($result) < 0) {
            return false;
        }
        return $result;
    }
    public function add($firstname,$lastname,$email,$city,$phone,$password) {
        $filds = array(
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'city'=>$city,
            'phone'=>$phone,
            'password'=>$password,
            'role'=>'user',
        );
        return $this->Insert($filds); 
    }
    public function getNameFamilyById($uid){
        $user = $this->GetFilds(
            array('firstname','lastname'),
            array('id'=>$uid)
        );
        if (isset($user['firstname']) && isset($user['lastname'])) {
            return $user['firstname']." ".$user['lastname'];
        }
        return;
    }
}