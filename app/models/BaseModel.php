<?php
namespace App\Model;

use PDO;
class BaseModel
{   
    protected $conn;
    private $hostName = 'localhost';
    private $dbName = 'qlnv';
    private $user = 'root';
    private $password = '';
    private $charset = 'utf8';

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostName; dbname=$this->dbName; charset = $this->charset", $this->user, $this->password);
            // $this->conn = new PDO("mysql:host=$this->host; dbname=$this->dbName; charset=$this->charset", $this->user, $this->pass);
            return true;
        } catch (PDOException $e) {
            var_dump($e->getMessages());die;
        }

    }

    public static function all()
    {
        $model = new static();

        $model->sql = "SELECT * FROM $model->table";
        $stmt=$model->conn->prepare($model->sql);
        // var_dump($stmt);die;
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result;
        // if(count($result)>0){
        //     return $result[0];
        // }else{
        //     return null;
        // }
        // var_dump($result);die;
    }

    public static function find($id){
        $model = new static();
        $model->sql = "SELECT * FROM $model->table WHERE id=:id";
        $stmt = $model->conn->prepare($model->sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        if(count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    
    public function delete($id){
        $this->sql = "DELETE FROM $this->table WHERE id = $id";
        $stmt = $this->conn->prepare($this->sql);
        $stmt->execute();
        // var_dump($stmt);die;
    }
    
    public static function where($arr)
    {
        $model = new static;
        $model->sql = "SELECT * FROM $model->table WHERE ";
        if(count($arr) == 2) {
            $model->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3) {
            $model->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
        return $model;
    }

    public function andWhere($arr)
    {
        $this->sql .= "and";
        if(count($arr) == 2) {
            $this->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3) {
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
        return $this;
    }

    public function orWhere($arr)
    {
        $this->sql .= "or";
        if(count($arr) == 2) {
            $this->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3) {
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
    }

    public function get()
    {
        $stmt = $this->conn->prepare($this->sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
        return $result;
    }
    
    public function first()
    {
       $list = $this->get();
       if(count($list) > 0) {
           return $list[0];
       } else {
           return null;
       }
    }

}