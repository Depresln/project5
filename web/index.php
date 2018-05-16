<?php

require_once "../vendor/autoload.php";

use App\Controller\DefaultController;
use App\Controller\ListController;
use App\Controller\PostController;

if (isset($_GET["page"])) {
    if ($_GET["page"] === "default.home") {
        $controller = new DefaultController();
        $controller->home();
    } elseif ($_GET["page"] === "bloglist") {
        $controller = new PostController();
        $controller->index();
    } else {
        echo "Erreur  404";
    }
} elseif (isset($_GET["id"])) {
    $id = $_GET["id"];
    $controller = new PostController();
    $controller->show($id);
} else {
    echo "Erreur  404";
}
