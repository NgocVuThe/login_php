<?php
namespace App\Controller;

use App\Model\User;

class UserController
{
    public function login(){
        if(isset($_POST['btnsubmit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            // var_dump($username, $password);die;
            $users = User::where(['username', $username])->first();
            // var_dump($users->username);die;
            // var_dump($users->username, $users->password);die;
            if($username == $users->username && $password == $users->password) {
                header('location: list');
            } else{
                header('location: login');
            }
            // var_dump($users);die;
        }
        include_once "app/views/user/login.php";
    }
}
