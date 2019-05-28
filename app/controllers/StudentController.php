<?php
namespace App\Controller;

use App\Model\Student;
use App\Model\User;
class StudentController
{
    public function listStudent()
    {   
        $students = Student::all();
        $path = "../";
        // var_dump($students);die;
        $view = "app/views/student/liststudent.php";
        include_once "app/views/layout/master.php";
    }

    public function createStudent()
    {
        include "app/views/student/createstudent.php";
    }

    public function submit()
    {
        $students = new Student();
        $name_student = $_POST['name_student'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $class = $_POST['class'];
        $students->save($name_student, $phone, $city, $class);
        // var_dump($students);die;
        header('location: list');
    }

    public function editStudent()
    {
        $id = $_GET['id'];
        $students = Student::find($id);
        include "app/views/student/editstudent.php";
    }

    public function updateStudent()
    {
        $id = $_POST['id'];
        $student = new Student();
        // $student = Student::find($id);
        $name = $_POST['name_student'];
        $phone = $_POST['phone'];
        $class = $_POST['class'];
        $city = $_POST['city'];
        $student->update($id ,$name, $phone, $class, $city);
        // var_dump($student);die;
        header('location: list');
    }

    public function del()
    {
        $id = $_GET['id'];
        $students = new Student();
        $students->delete($id);
        header('location: list');

    }

    public function login(){
        if(isset($_POST['btnsubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $users = User::all();
            if($username == $users->username && $password == $users->passwp){

            }
            // var_dump($users);die;
        }
        include_once "app/views/student/login.php";
    }
}


?>