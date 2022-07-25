<?php
namespace Resource;
use App\Classes\db;
abstract class Model
{
    public $DataBody=array();
    public $ISLIMITED=false;
    public function __construct($data=null)
    {
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = "SELECT * FROM {$this->TBNAME} WHERE {$this->PrimaryKey}='{$data}'";
        $result = $cdb->query($query)->fetchArray();
        $this->DataBody = $result;
    }
    public function IsExist(){
        if (count($this->DataBody)>0)
            return true;
        return false;
    }
    public function All(){
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = "SELECT * FROM {$this->TBNAME}";
        try{
            $result = $cdb->query($query)->fetchAll();
        } catch (\Throwable $th) {
            throw new Exception("Your DBNAME property is incorrect", 1);
        }
        return $result;
    }
    public function AllBy($where){
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = "SELECT * FROM {$this->TBNAME} WHERE ";
        $whering = [];
        foreach ($where as $key=>$value){
            $whering[] = $key."='".$value."'";
        }
        $query.=implode(" AND ",$whering);
//        echo $query;
        try{
            $result = $cdb->query($query)->fetchAll();
        } catch (\Throwable $th) {
            throw new Exception("Your DBNAME property is incorrect", 1);
        }
        return $result;
    }
    public function __get($name)
    {
        if (isset($this->DataBody[$name])) {
            return $this->DataBody[$name];
        } else {
            return 0;
        }
    }
    public function __set($name, $value)
    {
        $this->setDataBodyValue($name,$value);
    }
    private function setDataBodyValue($name, $value){
        if (
            $this->ISLIMITED and
            array_key_exists($name,$this->DataBody)
        ) {
            return;
        }
        $this->DataBody[$name] = $value;
    }
    public function Add()
    {
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = QueryBuilder::insert($this->DBNAME,$this->DataBody);
        $return = null;
        try{
            if ($cdb->query($query)) {
                $return = $cdb->lastInsertID();
            }
        }catch(\Exception $e){
            throw new \Exception('Error: ' . $e->getMessage());
        }

        $cdb->close();
        return $return;
    }
    public function Update()
    {
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = QueryBuilder::update($this->DBNAME,$this->DataBody,array('id'=>$this->id));
        $return = null;
        try{
            if ($cdb->query($query)) {
                $return = $cdb->lastInsertID();
            }
        }catch(\Exception $e){
            throw new \Exception('Error: ' . $e->getMessage());
        }

        $cdb->close();
        return $return;
    }
    public function Delete()
    {
        $cdb = new db(__dbhost__,__dbusername__,__dbpassword__,__dbname__);
        $query = QueryBuilder::delete($this->DBNAME,array('id'=>$this->id));
        $return = null;
        try{
            if ($cdb->query($query)) {
                $return = $cdb->lastInsertID();
            }
        }catch(\Exception $e){
            throw new \Exception('Error: ' . $e->getMessage());
        }

        $cdb->close();
        return $return;
    }
    public function __toString()
    {
        return $this->DataBody;

    }
}