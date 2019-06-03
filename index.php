<?php
    require "vendor/autoload.php";
    use App\Controller\HomeController;
    use App\Controller\StudentController;
    use App\Controller\UserController;
    // require "app/controllers/HomeController.php";
    // require "app/controllers/StudentController.php";
    $url = isset($_GET['url']) ? $_GET['url'] : '/';
    // var_dump($url);die;
    switch ($url) {
        case '/':
            $route = new HomeController();
            $route->index();
            break;
        case 'student/list':
            $route = new StudentController();
            $route->listStudent();
            break;
        case 'student/create':
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == 'GET'){
                $route = new StudentController();
                $route->createStudent();
            }else if($method=="POST"){
                $route = new StudentController();
                $route->submit();
            }
            break;
        case 'student/delete':
            $route = new StudentController();
            $route->del();
            break;
        case 'student/edit':
            // $method = $_SERVER['REQUEST_ME'];
            $route = new StudentController();
            $route->editStudent();
            break;
        case 'student/update':
            // $method = $_SERVER['REQUEST_ME'];
            $route = new StudentController();
            $route->updateStudent();
            break;
        case 'student/login':
            $route = new UserController();
            $route->login();
            break;
        default:
            echo "Trang 404";
            break;
    }

?>