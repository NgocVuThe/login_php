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
    
    

}