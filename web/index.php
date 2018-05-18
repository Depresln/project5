<?php

require_once "../vendor/autoload.php";

use App\Controller\DefaultController;
use App\Controller\PostController;

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
            echo "Erreur 500";
        }
    } else {
        echo "Erreur  404";
    }
} else {
    echo "Erreur  404";
}