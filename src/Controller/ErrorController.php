<?php

namespace App\Controller;

class ErrorController
{
    public function error404()
    {
        require "../src/View/Error/404.php";
    }

    public function error500()
    {
        require "../src/View/Error/500.php";
    }
}