<?php

require_once "../vendor/autoload.php";
use App\Controller\DefaultController;
use App\Controller\BlogListController;
use App\Controller\BlogPostController;

if (isset($_GET["page"]))
{
    if ($_GET["page"] === "default.home")
    {
        $controller = new DefaultController();
        $controller->home();
    }
    elseif ($_GET["page"] === "bloglist")
    {
        $controller = new BlogListController();
        $controller->bloglist();
    }
    elseif ($_GET["page"] === "blogpost")
    {
        $controller = new BlogPostController();
        $controller->blogpost();
    }
} else
{
    echo "Erreur  404";
}