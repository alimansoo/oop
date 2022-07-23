<?php
class DBProductBookmarkEngin extends DBEngine
{
    public $TABLE_NAME = 'bookmarkproduct';
    public function getBy_Pid_Uid($pid,$uid) {
        $result = $this->GetAllFildes(
            array(
                'pid'=>$pid,
                'uid'=>$uid
            )
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    public function getAllBy_Uid($uid) {
        global $cdb;
        $result = $this->GetAllFildes(
            array(
                'uid'=>$uid
            ),
            null,
            null,
            true //get All 
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    public function deleteByid($id){
        $this->Delete(
            array('id'=>$id)
        );
    }
    public function isContain($id){
        $result = $this->getBy_Pid_Uid(
            $id,$_SESSION['id']
        );
        if($result){
            return true;
        }
        return false;
    }
    public function add($pid,$uid)
    {
        $this->Insert(
            array('uid'=>$uid,'pid'=>$pid)
        );
    }
}