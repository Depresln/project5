<?php

require_once "../vendor/autoload.php";

use App\Controller\DefaultController;
use App\Controller\PostController;
use App\Controller\ErrorController;

try{
    if (isset($_GET["page"])) {
        if ($_GET["page"] === "default.home") {
            $controller = new DefaultController();
            $controller->home();
        } elseif ($_GET["page"] === "post.index") {
            $controller = new PostController();
            $controller->index();
        } elseif ($_GET["page"] === "post.show") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $controller = new PostController();
                $controller->show($id);
            } else {
                $controller = new ErrorController();
                $controller->error404();
            }
        } else {
            $controller = new ErrorController();
            $controller->error404();
        }
    } else {
        $controller = new ErrorController();
        $controller->error404();
    }
} catch(\Exception $exception) {
    $controller = new ErrorController();
    $controller->error500($exception);
}

//$class = "Controllers\\" . (isset($_GET['c'])) ? ucfirst($_GET['c']) . 'Controller' : 'DefaultController';
//$target = isset($_GET['t']) ? $_GET['t'] : 'index';
//$getParams = isset($_GET['params']) ? $_GET['params'] : null;
//$postParams = isset($_POST['params']) ? $_POST['params'] : null;
//$params = [
//    "get"   => $getParams,
//    "post"  => $postParams
//];
//
//if (class_exists($class, true)){
//    $class = new $class();
//    if (in_array($target, get_class_methods($class))){
//        call_user_func_array([$class, $target], $params);
//    } else {
//        call_user_func([$class, "index"]);
//    }
//} else {
//    echo "erreur 404";
//}