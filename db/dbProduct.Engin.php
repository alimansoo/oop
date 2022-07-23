<?php
class DBProductEngin extends DBEngine 
{
    public $TABLE_NAME = 'product';
    public function GetAllLikeBy($q) {
        return $this->GetAllFildes(
            null,
            null,
            array('name'=>$q),
            true
        );
    }
    public function getById($pid)
    {
        return $this->GetAllFildes(
            array('id'=> $pid)
        );
    }
    public function add($name,$catg,$price_component,$price,$image_src)
    {
        $data = array(
            'name'=>$name,
            'catg'=>$catg,
            'price_component'=>$price_component,
            'price'=>$price,
            'image_src'=>$image_src,
        );
        return $this->Insert($this->TABLE_NAME,$data);
    }
}