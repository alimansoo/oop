<?php
class DBCartEngin extends DBEngine
{
    public $TABLE_NAME = 'cards';
    public function getAllByUid($uid) {
        return $this->GetAllFildes(
            array('uid'=>$uid),
            null,
            null,
            true
        );
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
    public function getBy_id($cartid) {
        $result = $this->GetAllFildes(
            array(
                'id'=>$cartid
            )
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    public function isContain($id,$uid){
        $result = $this->getBy_Pid_Uid(
            $id,$uid
        );
        if($result){
            return true;
        }
        return false;
    }
    public function deleteByid($id){
        $this->Delete(array('id'=>$id));
    }
    public function add($pid,$uid)
    {
        $this->Insert(array('uid'=>$uid,'pid'=>$pid,'qty'=>1));
    }
    public function changeQtyCard($action,$cartid){
        $result = $this->getBy_id($cartid);
        if (count($result) < 1) {
            return -1;
        }
        $productqty = $result['qty'];
    
        switch ($action) {
            case 'add':
                $productqty++;
                break;
            case 'minus':
                $productqty--;
                break;
        }
        if ($productqty < 1) {
            $this->deleteByid($cartid);
            return 0;
        }
        $this->Update(
                array('qty'=>$productqty),
                array('id'=>$cartid)
            );
        return $productqty;
    }
}