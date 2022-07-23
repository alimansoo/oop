<?php
class DBLikeProductEngin extends DBEngine
{
    public $TABLE_NAME = 'likeproduct';
    public function isContain($pid,$uid){
        $result = $this->GetAllFildes(
            array('pid'=>$pid,'uid'=>$uid)
        );
        if(count($result) > 0 ){
            return true;
        }
        return false;
    }
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
    function getAllBy_Uid($uid) {
        $result = $this->GetAllFildes(
            array(
                'uid'=>$uid
            ),
            null,
            null,
            true
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    function deleteByid($id){
        $this->Delete(array('id'=>$id));
    }
    function add($pid,$uid)
    {
        $this->Insert(array('uid'=>$uid,'pid'=>$pid));
    }
}
