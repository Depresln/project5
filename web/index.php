<?php

require_once "../vendor/autoload.php";

use App\Controller\DefaultController;
use App\Controller\PostController;
use App\Controller\ErrorController;

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
            $controller->error500();
        }
    } else {
        $controller = new ErrorController();
        $controller->error404();
    }
} else {
    $controller = new ErrorController();
    $controller->error404();
}