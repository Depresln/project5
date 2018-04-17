<?php

require_once "../vendor/autoload.php";
use App\Controller\DefaultController;

if (isset($_GET["page"]))
{
    if ($_GET["page"] === "default.home")
    {
        $controller = new DefaultController();
        $controller->home();
    }
} else
{
    echo "Erreur  404";
}