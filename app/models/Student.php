<?php
namespace App\Model;
use App\Model\BaseModel;

class Student extends BaseModel
{
    protected $table = 'student';

    public function save($name_student, $phone, $city, $class)
    {
        $this->sql = "INSERT INTO $this->table(name_student, phone, city, class) 
        VALUES ('$name_student', '$phone', '$city', '$class')";
        $stmt = $this->conn->prepare($this->sql);
        // $stmt->bindParam('name_student', $name_student);
                // var_dump($stmt);die;
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Them moi that bai";die;
        }
    }

    public function update($id, $name, $phone, $class, $city)
    {
        $this->sql = "UPDATE $this->table SET name_student = '$name', phone = '$phone', city ='$city', class='$class' WHERE id = $id";
        $stmt = $this->conn->prepare($this->sql);
                // var_dump($stmt);die;
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Them moi that bai";die;
        }
    }
}