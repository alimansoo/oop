<?php

// interface DBEngineLayer1{
//     public function select($table_name,$get_filed,$where_filed,$sorting_by,$like_by);
//     public function insert($table_name,$insert_filed);
//     public function update($table_name,$update_filed ,$where_filed);
//     public function delete($table_name,$where_filed);
// }
// interface DBEngineLayer2{
//     public function getAll($where_filed,$sorting_by,$like_by,$result_all);
//     public function getFilds($get_filed,$where_filed,$sorting_by,$like_by,$result_all);
//     public function insertData($insert_filed);
//     public function updateData($update_filed ,$where_filed);
//     public function deleteData($where_filed);
// }

// $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);

class DBEngine
{
    public $cdb;
    public function __construct()
    {
        if (!isset($this->TABLE_NAME)) {
            throw new Exception("you dont set TABLE NAME property", 1);
        }
        $this->cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        
    }
    public function __destruct()
    {
        $this->cdb->close();
    }
    public function GetAll()
    {
        $query = QueryBuilder::select($this->TABLE_NAME,'*');
        $result = $this->cdb->query($query)->fetchAll();
        return $result;
    }
    public function GetAllFildes($where_filed=null, $sorting_by=null, $like_by=null,$result_all=false)
    {
        $query=QueryBuilder::select(
            $this->TABLE_NAME,
            '*',
            $where_filed,
            $sorting_by,
            $like_by
        );
        $result = $this->cdb->query($query);
        if ($result_all) {
            return $result->fetchAll();
        } else {
            return $result->fetchArray();
        }
    }
    public function GetFilds($get_filed, $where_filed=null, $sorting_by=null, $like_by=null,$result_all=false)
    {
        $query=QueryBuilder::select(
            $this->TABLE_NAME,
            $get_filed,
            $where_filed,
            $sorting_by,
            $like_by
        );
        $result = $this->cdb->query($query);
        if ($result_all) {
            return $result->fetchAll();
        } else {
            return $result->fetchArray();
        }
    }
    public function Insert($insert_filed)
    {
        $query=QueryBuilder::insert(
            $this->TABLE_NAME,
            $insert_filed
        );
        $result = $this->cdb->query($query)->lastInsertID();
        return $result;
    }
    public function Update($update_filed, $where_filed)
    {
        $query=QueryBuilder::update(
            $this->TABLE_NAME,
            $update_filed,
            $where_filed
        );
        $result = $this->cdb->query($query);
        return $result;
    }
    public function Delete($where_filed,$result_all=false)
    {
        $query=QueryBuilder::delete(
            $this->TABLE_NAME,
            $where_filed
        );
        $result = $this->cdb->query($query);
        return $result;
    }
}
