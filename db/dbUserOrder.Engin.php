<?php
class DBUserOrderEngin extends DBEngine
{
    public $TABLE_NAME = 'order_user';
    function getById($oid)
    {
        $result = $this->GetAllFildes(
            array(
                'id'=>$oid
            )
        );
        if (count($result) < 1) {
            return false;
        }
        return $result;
    }
    function add($userid,$reciveDate,$addres,$priceofall,$transportprice,$recivername){
        $datetime = new DateTime();
        $today = $datetime->format('Y-m-d H:i:s');
        $fileds = array(
            'uid'=>$userid,
            'recive_date'=>$reciveDate,
            'saved_date'=>$today,
            'addres'=>$addres,
            'priceAll'=>$priceofall,
            'transport_price'=>$transportprice,
            'reciver_name'=>$recivername,
            'is_pay'=>false,
        );
        return $this->Insert($fileds);
    }
    function payed($oid){
        $this->Update(
            array('is_pay'=>true),
            array('id'=>$oid)
        );
    }
    function getAllBy_uid_DESC($userid)
    {
        $result = $this->GetAllFildes(
            array(
                'uid'=>$userid
            )
            ,array(
                'id'=>'DESC'
            ),
            null,
            true
        );
        if (count($result) < 1) {
            return false;
        }
        return $result;
    }
}