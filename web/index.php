<?php

require_once "../vendor/autoload.php";
use App\Controller\DefaultController;
use App\Controller\ListController;
use App\Controller\PostController;

if (isset($_GET["page"]))
{
    if ($_GET["page"] === "default.home")
    {
        $controller = new DefaultController();
        $controller->home();
    }
    elseif ($_GET["page"] === "bloglist")
    {
        $controller = new ListController();
        $controller->bloglist();
    }
    elseif ($_GET["page"] === "blogpost")
    {
        $controller = new PostController();
        $controller->index();
    }
    else
    {
        echo "Erreur  404";
    }
} else
{
    echo "Erreur  404";
}