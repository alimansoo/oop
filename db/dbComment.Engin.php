<?php
class DBCommentEngin extends DBEngine
{
    public $TABLE_NAME = 'comment';
    public function getAllofThem()
    {
        $result = $this->GetAllFildes(
            null,
            null,
            null,
            true
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    public function getAllBy_pid($productId) {
        $result = $this->GetAllFildes(
            array(
                'pid'=>$productId
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
    public function getById($id) {
        $result = $this->GetAllFildes(
            array(
                'id'=>$id
            )
        );
        if(count($result) < 0 ){
            return false;
        }
        return $result;
    }
    public function add($productId,$userId,$subject,$content){
        $data = array(
            'pid'=>$productId,
            'uid'=>$userId,
            'subject'=>$subject,
            'message'=>$content
        );
        $this->Insert($data);
    }
}