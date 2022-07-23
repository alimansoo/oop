<?php
class DBUserOrderItemEngin extends DBEngine
{
    public $TABLE_NAME = 'order_user_item';
    function add($orderId,$ProducId,$ProductQty){
        $fileds = array(
            'oid'=>$orderId,
            'pid'=>$ProducId,
            'qty'=>$ProductQty
        );
        return $this->Insert($fileds);
    }
    function getAllByOrderId($orderId)
    {
        $result = $this->GetAllFildes(
            array(
                'oid'=>$orderId
            ),
            null,
            null,
            true
        );
        if (count($result) < 1) {
            return false;
        }
        return $result;
    }
}
